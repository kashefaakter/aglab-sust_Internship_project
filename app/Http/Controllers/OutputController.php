<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    /**
     * Display a listing of outputs.
     */
    public function index()
    {
        $outputs = Output::latest()->paginate(10);

        return view('admin.outputs.index', compact('outputs'));
    }

    /**
     * Show the form for creating a new output.
     */
    public function create()
    {
        return view('admin.outputs.create');
    }

    /**
     * Store a newly created output.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'output_type' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'external_url' => 'nullable|url|max:255',
            'status' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('outputs', 'public');
        }

        Output::create($validated);

        return redirect()
            ->route('outputs.index')
            ->with('success', 'Output added successfully.');
    }

    /**
     * Display the specified output.
     */
    public function show(Output $output)
    {
        return view('admin.outputs.show', compact('output'));
    }

    /**
     * Show the form for editing the specified output.
     */
    public function edit(Output $output)
    {
        return view('admin.outputs.edit', compact('output'));
    }

    /**
     * Update the specified output.
     */
    public function update(Request $request, Output $output)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'output_type' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'external_url' => 'nullable|url|max:255',
            'status' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('outputs', 'public');
        }

        $output->update($validated);

        return redirect()
            ->route('outputs.index')
            ->with('success', 'Output updated successfully.');
    }

    /**
     * Remove the specified output.
     */
    public function destroy(Output $output)
    {
        $output->delete();

        return redirect()
            ->route('outputs.index')
            ->with('success', 'Output deleted successfully.');
    }
}