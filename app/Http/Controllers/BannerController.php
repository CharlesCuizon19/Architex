<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Banner store method called', ['request_data' => $request->all()]);

        try {
            // ✅ First basic validation (title + subtitle)
            $request->validate([
                'title'    => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image'    => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi', // check type only
            ]);

            $file = $request->file('image');
            $mimeType = $file->getMimeType();

            // ✅ Determine size limit based on type
            $maxSize = str_starts_with($mimeType, 'image/')
                ? 2 * 1024 * 1024  // 2 MB for images
                : 25 * 1024 * 1024; // 25 MB for videos

            if ($file->getSize() > $maxSize) {
                return back()->withErrors([
                    'image' => 'File too large! Maximum is ' . ($maxSize / 1024 / 1024) . ' MB.'
                ])->withInput();
            }

            // ✅ Generate unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/banners'), $filename);
            $filePath = 'storage/banners/' . $filename;

            // ✅ Create record
            Banner::create([
                'title'    => $request->title,
                'subtitle' => $request->subtitle,
                'image'    => $filePath,
            ]);

            Log::info('Banner created successfully', ['file_path' => $filePath]);

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error storing banner', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        Log::info('Banner update method called', [
            'banner_id'    => $banner->id,
            'request_data' => $request->all()
        ]);

        try {
            $validated = $request->validate([
                'title'    => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2000',
            ]);

            Log::info('Validation passed for banner update', ['validated' => $validated]);

            if ($request->hasFile('image')) {
                // Upload new file
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('storage/banners'), $filename);

                // Delete old file if exists
                if ($banner->image && file_exists(public_path($banner->image))) {
                    unlink(public_path($banner->image));
                    Log::info('Old image deleted', ['old_image' => $banner->image]);
                }

                $validated['image'] = 'storage/banners/' . $filename;
                Log::info('New image stored successfully', ['new_image' => $validated['image']]);
            } else {
                $validated['image'] = $banner->image;
                Log::info('No new image uploaded, keeping old one', ['existing_image' => $banner->image]);
            }

            $banner->update($validated);

            Log::info('Banner updated successfully in database', [
                'banner_id'    => $banner->id,
                'updated_data' => $validated
            ]);

            return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating banner', [
                'banner_id' => $banner->id,
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'Something went wrong during update. Please check logs.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete image file if exists
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
            Log::info('Banner image deleted', ['image' => $banner->image]);
        }

        // Delete record
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
