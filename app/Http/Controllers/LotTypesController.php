<?php

namespace App\Http\Controllers;

use App\Models\LotsCategory;
use App\Models\LotsType;
use Illuminate\Http\Request;

class LotTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotTypes = LotsType::latest()->paginate();
        return view('admin.lotTypes.index', compact('lotTypes'));
    }

    public function create()
    {
        return view('admin.lotTypes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_name' => 'required|string|max:255'
        ]);

        LotsType::create([
            'type_name' => $validated['type_name'],
        ]);
        return redirect()->back()->with('Success', 'Category has been submitted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LotsType $lotType)
    {
        return view('admin.lotTypes.edit', compact('lotType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LotsType $lotType)
    {
        $validated = $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $lotType->update($validated);

        return redirect()->route('admin.lotCategories.index')->with('Success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lotType = LotsType::findOrFail($id);
        $lotType->delete();

        return redirect()->back()->with('Success', 'Category deleted successfully');
    }
}
