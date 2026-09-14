<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PublicationController extends Controller
{
    /**
     * Display a listing of publications.
     */
    public function index(Request $request)
    {
        $query = Publication::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('authors', 'like', "%{$search}%")
                ->orWhere('journal', 'like', "%{$search}%")
                ->orWhere('doi', 'like', "%{$search}%");
            });
        }

        // Year filter
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $publications = $query
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        // Years for filter dropdown
        $years = Publication::whereNotNull('year')
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        return view('admin.publications.index', compact(
            'publications',
            'years'
        ));
        }

        /**
         * Show the form for creating a new publication.
         */
        public function create()
        {
            return view('admin.publications.create');
        }

        /**
         * Store a newly created publication.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'authors' => 'nullable|string',
                'journal' => 'nullable|string|max:255',
                'year' => 'nullable|integer|min:1900|max:2100',
                'publication_type' => 'nullable|string|max:100',
                'status' => 'nullable|string|max:100',
                'citation' => 'nullable|string',
                'doi' => 'nullable|string|max:255',
                'abstract' => 'nullable|string',
                'publication_url' => 'nullable|url|max:255',
                'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            ]);

            if ($request->hasFile('pdf_file')) {
                $validated['pdf_file'] = $request
                    ->file('pdf_file')
                    ->store('publications', 'public');
            }

            Publication::create($validated);

            return redirect()
                ->route('publications.index')
                ->with('success', 'Publication added successfully.');
        }

        /**
         * Display the specified publication.
         */
        public function show(Publication $publication)
        {
            return view('admin.publications.show', compact('publication'));
        }

    /**
     * Show the form for editing the specified publication.
     */
    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', compact('publication'));
    }

    /**
     * Update the specified publication.
     */
    public function update(Request $request, Publication $publication)
    {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'authors' => 'nullable|string',
        'journal' => 'nullable|string|max:255',
        'year' => 'nullable|integer|min:1900|max:2100',
        'publication_type' => 'nullable|string|max:100',
        'status' => 'nullable|string|max:100',
        'citation' => 'nullable|string',
        'doi' => 'nullable|string|max:255',
        'abstract' => 'nullable|string',
        'publication_url' => 'nullable|url|max:255',
        'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
    ]);

    if ($request->hasFile('pdf_file')) {

        // Delete old PDF
        if ($publication->pdf_file &&
            Storage::disk('public')->exists($publication->pdf_file)) {

            Storage::disk('public')->delete($publication->pdf_file);
        }

        // Store new PDF
        $validated['pdf_file'] =
            $request->file('pdf_file')->store(
                'publications',
                'public'
            );
    }

    $publication->update($validated);

    return redirect()
        ->route('publications.index')
        ->with('success', 'Publication updated successfully.');
    }

    /**
     * Remove the specified publication.
     */
    public function destroy(Publication $publication)
    {
    // Delete associated PDF
    if ($publication->pdf_file &&
        Storage::disk('public')->exists($publication->pdf_file)) {

        Storage::disk('public')->delete($publication->pdf_file);
    }

    // Delete publication record
    $publication->delete();

    return redirect()
        ->route('publications.index')
        ->with('success', 'Publication deleted successfully.');
    }
}