<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlockController extends Controller
{
    public function index()
    {
        $blocks = Block::with('property')->latest()->paginate(10);
        $properties = Properties::all(); // For dropdown if needed in index
        return view('admin.blocks.index', compact('blocks', 'properties'));
    }

    public function create()
    {
        $properties = Properties::all(); // For dropdown
        return view('admin.blocks.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'block_number' => 'required|string|max:255',
        ]);

        Block::create($request->only('property_id', 'block_number'));

        return redirect()->route('admin.blocks.index')->with('success', 'Block created successfully.');
    }

    public function edit(Block $block)
    {
        $properties = Properties::all();
        return view('admin.blocks.edit', compact('block', 'properties'));
    }

    public function update(Request $request, Block $block)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'block_number' => 'required|string|max:255',
        ]);

        $block->update($request->only('property_id', 'block_number'));

        return redirect()->route('admin.blocks.index')->with('success', 'Block updated successfully.');
    }

    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('admin.blocks.index')->with('success', 'Block deleted successfully.');
    }
}
