<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogs;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('category_name')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        Log::info('Blog store method called', ['request_data' => $request->all()]);

        try {
            $request->validate([
                'category_id' => 'required|exists:blog_categories,id',
                'blog_title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'blog_image' => 'required|file|mimes:jpg,jpeg,png,webp,gif,mp4,mov,avi|max:20000',
                'blog_date' => 'required|date',
            ]);

            Log::info('Validation passed for blog store');

            // Save uploaded image
            $blogImage = $request->file('blog_image');
            $filename = time() . '_' . uniqid() . '.' . $blogImage->getClientOriginalExtension();
            $blogImage->move(public_path('storage/blogs'), $filename);
            $blogImagePath = 'storage/blogs/' . $filename;

            // Create blog
            Blog::create([
                'category_id' => $request->category_id,
                'blog_title' => $request->blog_title,
                'description' => $request->description,
                'blog_image' => $blogImagePath,
                'blog_date' => $request->blog_date,
            ]);

            Log::info('Blog created successfully', ['blog_title' => $request->blog_title]);

            return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing blog', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('category_name')->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        Log::info('Blog update method called', [
            'blog_id' => $blog->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'category_id' => 'required|exists:blog_categories,id',
                'blog_title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'blog_image' => 'nullable|file|mimes:jpg,jpeg,png,webp,gif,mp4,mov,avi|max:20000',
                'blog_date' => 'required|date',
            ]);

            // If new image uploaded
            if ($request->hasFile('blog_image')) {
                if ($blog->blog_image && file_exists(public_path($blog->blog_image))) {
                    unlink(public_path($blog->blog_image));
                    Log::info('Old blog image deleted', ['old_image' => $blog->blog_image]);
                }

                $newImage = $request->file('blog_image');
                $filename = time() . '_' . uniqid() . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('storage/blogs'), $filename);

                $validated['blog_image'] = 'storage/blogs/' . $filename;
                Log::info('New blog image uploaded', ['path' => $validated['blog_image']]);
            }

            $blog->update($validated);

            Log::info('Blog updated successfully', [
                'blog_id' => $blog->id,
                'updated_data' => $validated,
            ]);

            return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating blog', [
                'blog_id' => $blog->id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Something went wrong during update.');
        }
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->blog_image && file_exists(public_path($blog->blog_image))) {
            unlink(public_path($blog->blog_image));
            Log::info('Blog image deleted', ['path' => $blog->blog_image]);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
