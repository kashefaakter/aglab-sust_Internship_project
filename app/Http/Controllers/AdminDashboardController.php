<?php

namespace App\Http\Controllers;

use App\Models\Publication;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPublications = Publication::count();

        $publishedPublications = Publication::where(
            'status',
            'Published'
        )->count();

        $draftPublications = Publication::where(
            'status',
            'Draft'
        )->count();

        $latestYear = Publication::whereNotNull('year')
            ->max('year');

        $recentPublications = Publication::latest()
            ->take(5)
            ->get();

        $yearCounts = Publication::whereNotNull('year')
            ->selectRaw('year, COUNT(*) as total')
            ->groupBy('year')
            ->orderByDesc('year')
            ->get();

        return view('admin.dashboard', compact(
            'totalPublications',
            'publishedPublications',
            'draftPublications',
            'latestYear',
            'recentPublications',
            'yearCounts'
        ));
    }
}