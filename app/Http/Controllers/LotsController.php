<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use App\Models\Block;
use App\Models\LotsCategory;
use App\Models\LotsType;
use App\Models\LotsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lots = Lots::with(['block', 'category', 'type', 'images'])->latest()->paginate(10);
        $blocks = Block::all();
        $types = LotsType::all();

        return view('admin.lots.index', compact('lots', 'blocks', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blocks = Block::all();
        $categories = LotsCategory::all();
        $types = LotsType::all();

        return view('admin.lots.create', compact('blocks', 'categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Lots store method called', ['request' => $request->all()]);

        try {
            $validated = $request->validate([
                'block_id'    => 'required|exists:blocks,id',
                'category_id' => 'required|exists:lots_categories,id',
                'type_id'     => 'required|exists:lots_types,id',
                'lot_name'    => 'required|string|max:255',
                'area'        => 'required|numeric|min:0',
                'price'       => 'required|numeric|min:0',
                'status'      => 'required|in:available,sold,reserved',
                'description' => 'nullable|string',
                'x'           => 'nullable|numeric',
                'y'           => 'nullable|numeric',
                'images.*'    => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $lot = Lots::create($validated);

            // ✅ Handle multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/lots'), $filename);

                    LotsImage::create([
                        'lots_id'    => $lot->id,
                        'image' => 'storage/lots/' . $filename,
                    ]);
                }
                Log::info('Lot images uploaded successfully', ['lot_id' => $lot->id]);
            }

            return redirect()
                ->route('admin.lots.index')
                ->with('success', 'Lot created successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing lot', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lots $lot)
    {
        $blocks = Block::all();
        $categories = LotsCategory::all();
        $types = LotsType::all();

        return view('admin.lots.edit', compact('lot', 'blocks', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lots $lot)
    {
        Log::info('Lots update method called', [
            'lot_id' => $lot->id,
            'request' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'block_id'    => 'required|exists:blocks,id',
                'category_id' => 'required|exists:lots_categories,id',
                'type_id'     => 'required|exists:lots_types,id',
                'lot_name'    => 'required|string|max:255',
                'area'        => 'required|numeric|min:0',
                'price'       => 'required|numeric|min:0',
                'status'      => 'required|in:available,sold,reserved',
                'description' => 'nullable|string',
                'x'           => 'nullable|numeric',
                'y'           => 'nullable|numeric',
                'images.*'    => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $lot->update($validated);

            // ✅ Add new images (keep old ones)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/lots'), $filename);

                    LotsImage::create([
                        'lots_id'    => $lot->id,
                        'image_path' => 'storage/lots/' . $filename,
                    ]);
                }
                Log::info('New images added to lot', ['lot_id' => $lot->id]);
            }

            return redirect()->route('admin.lots.index')->with('success', 'Lot updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating lot', [
                'lot_id' => $lot->id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Something went wrong during update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lot = Lots::findOrFail($id);

        // ✅ Delete all associated images
        foreach ($lot->images as $image) {
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
                Log::info('Deleted lot image', ['image' => $image->image]);
            }
            $image->delete();
        }

        $lot->delete();
        Log::info('Lot deleted successfully', ['lot_id' => $id]);

        return redirect()->route('admin.lots.index')->with('success', 'Lot deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = LotsImage::findOrFail($id);

        // Delete image file from storage
        if (file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        Log::info('Lot image deleted', ['image_id' => $id]);

        return response()->json(['success' => true]);
    }
}
