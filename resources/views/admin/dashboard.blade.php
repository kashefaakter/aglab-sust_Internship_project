@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('styles')
<style>
    .welcome-section {
        margin-bottom: 28px;
    }

    .welcome-section h2 {
        font-size: 25px;
        color: #111827;
        margin-bottom: 7px;
    }

    .welcome-section p {
        color: #6b7280;
        font-size: 14px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: #166534;
    }

    .stat-label {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .stat-number {
        color: #111827;
        font-size: 30px;
        font-weight: 700;
    }

    .stat-icon {
        position: absolute;
        right: 20px;
        top: 20px;
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #ecfdf5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 24px;
    }

    .card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        overflow: hidden;
    }

    .card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-header h3 {
        font-size: 16px;
        color: #111827;
    }

    .card-header a {
        color: #166534;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .publication-list {
        padding: 5px 22px;
    }

    .publication-item {
        padding: 17px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .publication-item:last-child {
        border-bottom: none;
    }

    .publication-title {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 6px;
    }

    .publication-meta {
        color: #6b7280;
        font-size: 12px;
    }

    .badge {
        display: inline-flex;
        padding: 4px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        margin-left: 7px;
    }

    .badge-published {
        background: #dcfce7;
        color: #166534;
    }

    .badge-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .year-list {
        padding: 10px 22px 20px;
    }

    .year-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .year-row:last-child {
        border-bottom: none;
    }

    .year-name {
        font-size: 14px;
        color: #374151;
        font-weight: 600;
    }

    .year-count {
        min-width: 32px;
        text-align: center;
        padding: 5px 9px;
        border-radius: 20px;
        background: #ecfdf5;
        color: #166534;
        font-size: 12px;
        font-weight: 700;
    }

    .quick-actions {
        margin-top: 24px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .quick-action {
        padding: 15px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: #374151;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .quick-action:hover {
        border-color: #86efac;
        background: #f0fdf4;
        color: #166534;
    }

    .empty-state {
        padding: 35px 20px;
        text-align: center;
        color: #9ca3af;
        font-size: 14px;
    }

    @media(max-width: 1100px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 600px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')

<div class="welcome-section">

    <h2>Welcome to AG-Lab Admin</h2>

    <p>
        Manage publications and research outputs from your administration panel.
    </p>

</div>


{{-- Statistics --}}
<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon">📚</div>

        <div class="stat-label">
            TOTAL PUBLICATIONS
        </div>

        <div class="stat-number">
            {{ $totalPublications }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon">✓</div>

        <div class="stat-label">
            PUBLISHED
        </div>

        <div class="stat-number">
            {{ $publishedPublications }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon">📝</div>

        <div class="stat-label">
            DRAFTS
        </div>

        <div class="stat-number">
            {{ $draftPublications }}
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon">📅</div>

        <div class="stat-label">
            LATEST YEAR
        </div>

        <div class="stat-number">
            {{ $latestYear ?? '—' }}
        </div>

    </div>

</div>


<div class="dashboard-grid">

    {{-- Recent Publications --}}
    <div class="card">

        <div class="card-header">

            <h3>Recent Publications</h3>

            <a href="{{ route('publications.index') }}">
                View All →
            </a>

        </div>


        <div class="publication-list">

            @forelse($recentPublications as $publication)

                <div class="publication-item">

                    <div class="publication-title">

                        {{ $publication->title }}

                        @if($publication->status === 'Published')

                            <span class="badge badge-published">
                                Published
                            </span>

                        @else

                            <span class="badge badge-draft">
                                Draft
                            </span>

                        @endif

                    </div>

                    <div class="publication-meta">

                        {{ $publication->journal ?? 'Journal not specified' }}

                        @if($publication->year)
                            · {{ $publication->year }}
                        @endif

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    No publications have been added yet.
                </div>

            @endforelse

        </div>

    </div>


    {{-- Publications by Year --}}
    <div class="card">

        <div class="card-header">

            <h3>Publications by Year</h3>

        </div>

        <div class="year-list">

            @forelse($yearCounts as $year)

                <div class="year-row">

                    <span class="year-name">
                        {{ $year->year }}
                    </span>

                    <span class="year-count">
                        {{ $year->total }}
                    </span>

                </div>

            @empty

                <div class="empty-state">
                    No year information available.
                </div>

            @endforelse

        </div>

    </div>

</div>


{{-- Quick Actions --}}
<div class="card" style="margin-top:24px; padding:22px;">

    <h3 style="font-size:16px; margin-bottom:15px;">
        Quick Actions
    </h3>

    <div class="quick-actions">

        <a
            href="{{ route('publications.create') }}"
            class="quick-action"
        >
            ＋ Add New Publication
        </a>

        <a
            href="{{ route('public.outputs') }}"
            target="_blank"
            class="quick-action"
        >
            🌐 View Public Outputs
        </a>

    </div>

</div>

@endsection