<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicPublicationController extends Controller
{
    /**
     * Display published publications.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | ALL PUBLISHED PUBLICATIONS
        |--------------------------------------------------------------------------
        |
        | This collection is kept separate from the filtered results.
        | Therefore, the statistics and "Browse by Year" sidebar
        | remain unchanged when the user searches or filters.
        |
        */

        $allPublications = Publication::where('status', 'Published')
            ->whereNotNull('year')
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | SEARCH + YEAR FILTER
        |--------------------------------------------------------------------------
        */

        $query = Publication::where('status', 'Published');


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

            $query->where(
                'year',
                $request->year
            );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTERED PUBLICATIONS
        |--------------------------------------------------------------------------
        */

        $publications = $query
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | GROUP PUBLICATIONS BY YEAR
        |--------------------------------------------------------------------------
        |
        | This is used by the main Outputs page to display publications
        | under year headings.
        |
        */

        $groupedPublications = $publications->groupBy('year');


        /*
        |--------------------------------------------------------------------------
        | PUBLICATION STATISTICS
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        | These statistics are based on ALL published publications,
        | not the filtered result.
        |
        */

        $totalPublications = $allPublications->count();


        $activeYears = $allPublications
            ->pluck('year')
            ->unique()
            ->count();


        $latestYear = $allPublications
            ->max('year');


        $earliestYear = $allPublications
            ->min('year');


        /*
        |--------------------------------------------------------------------------
        | BROWSE BY YEAR
        |--------------------------------------------------------------------------
        |
        | This always contains ALL available publication years.
        |
        */

        $years = $allPublications
            ->pluck('year')
            ->unique()
            ->sortDesc()
            ->values();


        /*
        |--------------------------------------------------------------------------
        | PUBLICATION COUNT BY YEAR
        |--------------------------------------------------------------------------
        |
        | Sidebar counts remain stable even when a search/year filter
        | is applied.
        |
        */

        $yearCounts = $allPublications
            ->groupBy('year')
            ->map(function ($items) {

                return $items->count();

            })
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'public.outputs',
            compact(
                'publications',
                'groupedPublications',
                'totalPublications',
                'activeYears',
                'latestYear',
                'earliestYear',
                'yearCounts',
                'years'
            )
        );
    }


    /**
     * Display a single publication.
     */
    public function show(Publication $publication)
    {
        /*
        |--------------------------------------------------------------------------
        | ONLY PUBLISHED PUBLICATIONS ARE PUBLIC
        |--------------------------------------------------------------------------
        */

        if ($publication->status !== 'Published') {
            abort(404);
        }


        return view(
            'public.publication-details',
            compact('publication')
        );
    }
}