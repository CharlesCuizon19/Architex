<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::latest()->paginate();
        return view('admin.blogCategories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $blogCategory = BlogCategory::create([
            'category_name' => $validated['category_name']
        ]);

        // If request is AJAX, return JSON
        if ($request->ajax()) {
            return response()->json($blogCategory);
        }

        // Otherwise normal redirect
        return redirect()->back()->with('Success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategories)
    {
        return view('admin.blogCategories.edit', compact('blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategories)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $blogCategories->update($validated);

        return redirect()->route('admin.blogCategories.index')->with('Success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blogCategories = BlogCategory::findOrFail($id);
        $blogCategories->delete();

        return redirect()->back()->with('Success', 'Category deleted successfully');
    }
}
