@extends('layouts.admin')

@section('title', 'Publications')

@section('content')

<style>
    .publications-page {
        padding: 5px 0 30px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    .page-header p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .add-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        background: #166534;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s ease;
    }

    .add-btn:hover {
        background: #14532d;
        color: #fff;
        transform: translateY(-1px);
    }

    /* FILTER */

    .filter-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
    }

    .filter-form {
        display: grid;
        grid-template-columns: minmax(250px, 1fr) 160px 160px auto auto;
        gap: 12px;
        align-items: end;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        color: #374151;
        font-size: 12px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        height: 43px;
        padding: 0 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        background: #fff;
        color: #111827;
        font-size: 13px;
        outline: none;
        transition: .2s ease;
    }

    .form-control:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, .10);
    }

    .filter-btn,
    .clear-btn {
        height: 43px;
        padding: 0 16px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .filter-btn {
        border: none;
        background: #166534;
        color: #fff;
    }

    .filter-btn:hover {
        background: #14532d;
    }

    .clear-btn {
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
    }

    .clear-btn:hover {
        border-color: #86efac;
        color: #166534;
        background: #f0fdf4;
    }

    .filter-result {
        margin-top: 13px;
        color: #6b7280;
        font-size: 12px;
    }

    /* ALERT */

    .alert-success {
        background: #ecfdf5;
        border: 1px solid #bbf7d0;
        color: #166534;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    /* TABLE */

    .table-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
    }

    .table-header {
        padding: 17px 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .table-header h2 {
        margin: 0;
        font-size: 16px;
        color: #111827;
    }

    .total-count {
        color: #6b7280;
        font-size: 12px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .publication-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
    }

    .publication-table th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .4px;
        font-weight: 700;
        text-align: left;
        padding: 13px 16px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .publication-table td {
        padding: 16px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        color: #374151;
        font-size: 13px;
    }

    .publication-table tbody tr {
        transition: .15s ease;
    }

    .publication-table tbody tr:hover {
        background: #fafffb;
    }

    .publication-table tbody tr:last-child td {
        border-bottom: none;
    }

    .title-cell {
        max-width: 320px;
    }

    .publication-title {
        color: #111827;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 4px;
    }

    .publication-title a {
        color: inherit;
        text-decoration: none;
    }

    .publication-title a:hover {
        color: #166534;
    }

    .publication-meta {
        color: #9ca3af;
        font-size: 11px;
    }

    .authors-cell {
        max-width: 200px;
        line-height: 1.5;
        color: #4b5563;
    }

    .journal-cell {
        max-width: 190px;
        color: #4b5563;
        line-height: 1.5;
    }

    .year-badge {
        display: inline-block;
        background: #f3f4f6;
        color: #374151;
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
    }

    .doi-text {
        max-width: 150px;
        word-break: break-word;
        color: #166534;
        font-size: 12px;
    }

    .doi-text a {
        color: #166534;
        text-decoration: none;
    }

    .doi-text a:hover {
        text-decoration: underline;
    }

    /* STATUS */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-badge.published {
        background: #ecfdf5;
        color: #166534;
    }

    .status-badge.draft {
        background: #fff7ed;
        color: #c2410c;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    /* ACTIONS */

    .actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 7px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #4b5563;
        cursor: pointer;
        transition: .2s ease;
    }

    .action-btn:hover {
        background: #f0fdf4;
        border-color: #86efac;
        color: #166534;
    }

    .action-btn.delete:hover {
        background: #fef2f2;
        border-color: #fecaca;
        color: #dc2626;
    }

    .delete-form {
        display: inline;
        margin: 0;
    }

    /* EMPTY */

    .empty-state {
        padding: 65px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #ecfdf5;
        color: #166534;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        color: #374151;
        font-size: 18px;
    }

    .empty-state p {
        margin: 0;
        color: #9ca3af;
        font-size: 13px;
    }

    .empty-add-btn {
        display: inline-flex;
        margin-top: 18px;
        padding: 9px 14px;
        border-radius: 7px;
        background: #166534;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    /* PAGINATION */

    .pagination-wrapper {
        padding: 17px 20px;
        border-top: 1px solid #f1f5f9;
    }

    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper svg {
        width: 18px;
        height: 18px;
    }

    /* RESPONSIVE */

    @media (max-width: 1100px) {
        .filter-form {
            grid-template-columns: 1fr 1fr;
        }

        .filter-form .search-group {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .add-btn {
            width: 100%;
            justify-content: center;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        .filter-form .search-group {
            grid-column: auto;
        }

        .filter-btn,
        .clear-btn {
            width: 100%;
        }
    }
</style>


<div class="publications-page">

    {{-- PAGE HEADER --}}

    <div class="page-header">

        <div>
            <h1>Publications</h1>

            <p>
                Manage AG-Lab research publications and scholarly outputs.
            </p>
        </div>

        <a
            href="{{ route('publications.create') }}"
            class="add-btn"
        >
            <span>＋</span>
            Add Publication
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))

        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>

    @endif


    {{-- FILTER CARD --}}

    <div class="filter-card">

        <form
            method="GET"
            action="{{ route('publications.index') }}"
            class="filter-form"
        >

            {{-- SEARCH --}}

            <div class="form-group search-group">

                <label for="search">
                    Search Publications
                </label>

                <input
                    type="text"
                    id="search"
                    name="search"
                    class="form-control"
                    value="{{ request('search') }}"
                    placeholder="Search by title, author, journal or DOI..."
                >

            </div>


            {{-- YEAR --}}

            <div class="form-group">

                <label for="year">
                    Year
                </label>

                <select
                    name="year"
                    id="year"
                    class="form-control"
                >

                    <option value="">
                        All Years
                    </option>

                    @foreach($years as $year)

                        <option
                            value="{{ $year }}"
                            {{ request('year') == $year ? 'selected' : '' }}
                        >
                            {{ $year }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- STATUS --}}

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    class="form-control"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="Published"
                        {{ request('status') == 'Published' ? 'selected' : '' }}
                    >
                        Published
                    </option>

                    <option
                        value="Draft"
                        {{ request('status') == 'Draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>

                </select>

            </div>


            {{-- SEARCH BUTTON --}}

            <button
                type="submit"
                class="filter-btn"
            >
                🔍 Filter
            </button>


            {{-- CLEAR BUTTON --}}

            <a
                href="{{ route('publications.index') }}"
                class="clear-btn"
            >
                Clear
            </a>

        </form>


        @if(request('search') || request('year') || request('status'))

            <div class="filter-result">

                Showing
                <strong>{{ $publications->total() }}</strong>
                matching publication{{ $publications->total() == 1 ? '' : 's' }}.

            </div>

        @endif

    </div>


    {{-- TABLE CARD --}}

    <div class="table-card">

        <div class="table-header">

            <h2>
                Publication Records
            </h2>

            <span class="total-count">
                {{ $publications->total() }}
                total records
            </span>

        </div>


        @if($publications->count())

            <div class="table-wrapper">

                <table class="publication-table">

                    <thead>

                        <tr>

                            <th>
                                Title
                            </th>

                            <th>
                                Authors
                            </th>

                            <th>
                                Journal
                            </th>

                            <th>
                                Year
                            </th>

                            <th>
                                DOI
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($publications as $publication)

                            <tr>

                                {{-- TITLE --}}

                                <td class="title-cell">

                                    <div class="publication-title">

                                        <a
                                            href="{{ route(
                                                'publications.show',
                                                $publication
                                            ) }}"
                                        >
                                            {{ $publication->title }}
                                        </a>

                                    </div>

                                    @if($publication->publication_type)

                                        <div class="publication-meta">
                                            {{ $publication->publication_type }}
                                        </div>

                                    @endif

                                </td>


                                {{-- AUTHORS --}}

                                <td class="authors-cell">

                                    {{ $publication->authors ?: '—' }}

                                </td>


                                {{-- JOURNAL --}}

                                <td class="journal-cell">

                                    {{ $publication->journal ?: '—' }}

                                </td>


                                {{-- YEAR --}}

                                <td>

                                    @if($publication->year)

                                        <span class="year-badge">
                                            {{ $publication->year }}
                                        </span>

                                    @else

                                        —

                                    @endif

                                </td>


                                {{-- DOI --}}

                                <td>

                                    @if($publication->doi)

                                        <div class="doi-text">

                                            <a
                                                href="https://doi.org/{{ ltrim($publication->doi, 'https://doi.org/') }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                            >
                                                {{ $publication->doi }}
                                            </a>

                                        </div>

                                    @else

                                        —

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($publication->status === 'Published')

                                        <span class="status-badge published">

                                            <span class="status-dot"></span>

                                            Published

                                        </span>

                                    @else

                                        <span class="status-badge draft">

                                            <span class="status-dot"></span>

                                            Draft

                                        </span>

                                    @endif

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="actions">

                                        {{-- VIEW --}}

                                        <a
                                            href="{{ route(
                                                'publications.show',
                                                $publication
                                            ) }}"
                                            class="action-btn"
                                            title="View"
                                        >
                                            👁
                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route(
                                                'publications.edit',
                                                $publication
                                            ) }}"
                                            class="action-btn"
                                            title="Edit"
                                        >
                                            ✏
                                        </a>


                                        {{-- DELETE --}}

                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'publications.destroy',
                                                $publication
                                            ) }}"
                                            class="delete-form"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this publication?'
                                            );"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete"
                                                title="Delete"
                                            >
                                                🗑
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}

            <div class="pagination-wrapper">

                {{ $publications->links() }}

            </div>


        @else

            {{-- EMPTY STATE --}}

            <div class="empty-state">

                <div class="empty-icon">
                    📚
                </div>

                <h3>
                    No Publications Found
                </h3>

                <p>

                    @if(request('search') || request('year') || request('status'))

                        No publications match your current filters.

                    @else

                        No publications have been added yet.

                    @endif

                </p>


                @if(request('search') || request('year') || request('status'))

                    <a
                        href="{{ route('publications.index') }}"
                        class="empty-add-btn"
                    >
                        Clear Filters
                    </a>

                @else

                    <a
                        href="{{ route('publications.create') }}"
                        class="empty-add-btn"
                    >
                        Add First Publication
                    </a>

                @endif

            </div>

        @endif

    </div>

</div>

@endsection