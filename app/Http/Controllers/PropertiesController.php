<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PropertiesController extends Controller
{
    /**
     * Display a listing of properties.
     */
    public function index()
    {
        $properties = Properties::with('images')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'property_thumbnail' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'property_images.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        try {
            $thumbnailPath = null;

            // ✅ Handle thumbnail upload
            if ($request->hasFile('property_thumbnail')) {
                $thumbnail = $request->file('property_thumbnail');
                $filename = time() . '_thumb.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('storage/properties'), $filename);
                $thumbnailPath = 'storage/properties/' . $filename;
            }

            // ✅ Create main property record
            $property = Properties::create([
                'name' => $request->name,
                'description' => $request->description,
                'property_thumbnail' => $thumbnailPath,
            ]);

            // ✅ Handle multiple property images
            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/properties'), $filename);

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image' => 'storage/properties/' . $filename,
                    ]);
                }
            }

            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing property', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create property.');
        }
    }

    /**
     * Show the form for editing the specified property.
     */
    public function edit(Properties $property)
    {
        $property->load('images');
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, Properties $property)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'property_thumbnail' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'property_images.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        try {
            // ✅ Update thumbnail if new one is uploaded
            if ($request->hasFile('property_thumbnail')) {
                if ($property->property_thumbnail && file_exists(public_path($property->property_thumbnail))) {
                    unlink(public_path($property->property_thumbnail));
                }

                $thumbnail = $request->file('property_thumbnail');
                $filename = time() . '_thumb.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('storage/properties'), $filename);
                $property->property_thumbnail = 'storage/properties/' . $filename;
            }

            $property->update([
                'name' => $request->name,
                'description' => $request->description,
                'property_thumbnail' => $property->property_thumbnail,
            ]);

            // ✅ Add new images if uploaded
            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/properties'), $filename);

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image' => 'storage/properties/' . $filename,
                    ]);
                }
            }

            return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating property', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to update property.');
        }
    }

    /**
     * Remove the specified property.
     */
    public function destroy($id)
    {
        $property = Properties::with('images')->findOrFail($id);

        // ✅ Delete thumbnail
        if ($property->property_thumbnail && file_exists(public_path($property->property_thumbnail))) {
            unlink(public_path($property->property_thumbnail));
        }

        // ✅ Delete related images
        foreach ($property->images as $img) {
            if ($img->image && file_exists(public_path($img->image))) {
                unlink(public_path($img->image));
            }
            $img->delete();
        }

        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = PropertyImage::findOrFail($id);

        try {
            if ($image->image && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $image->delete();

            return back()->with('success', 'Property image deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting property image', ['message' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete property image.');
        }
    }
}
