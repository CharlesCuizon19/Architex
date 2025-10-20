<?php

namespace App\Http\Controllers;

use App\Models\LotsCategory;
use Illuminate\Http\Request;

class LotCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotCategories = LotsCategory::latest()->paginate();
        return view('admin.lotCategories.index', compact('lotCategories'));
    }

    public function create()
    {
        return view('admin.lotCategories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        LotsCategory::create([
            'category_name' => $validated['category_name'],
        ]);
        return redirect()->back()->with('Success', 'Category has been submitted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LotsCategory $lotsCategory)
    {
        return view('admin.lotCategories.edit', compact('lotsCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LotsCategory $lotsCategory)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $lotsCategory->update($validated);

        return redirect()->route('admin.lotCategories.index')->with('Success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lotCategories = LotsCategory::findOrFail($id);
        $lotCategories->delete();

        return redirect()->back()->with('Success', 'Category deleted successfully');
    }
}
