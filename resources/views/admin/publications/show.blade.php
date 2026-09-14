@extends('layouts.admin')

@section('title', 'Publication Details')
@section('page-title', 'Publication Details')

@section('styles')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 15px;
    }

    .page-header h2 {
        font-size: 22px;
        color: #111827;
    }

    .header-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 16px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all .2s ease;
    }

    .btn-primary {
        background: #166534;
        color: #fff;
    }

    .btn-primary:hover {
        background: #14532d;
        transform: translateY(-1px);
    }

    .btn-light {
        background: #fff;
        color: #374151;
        border: 1px solid #d1d5db;
    }

    .btn-light:hover {
        background: #f9fafb;
    }

    .publication-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 24px;
        align-items: start;
    }

    .card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
    }

    .main-card {
        padding: 32px;
    }

    .publication-type {
        display: inline-flex;
        padding: 6px 12px;
        background: #ecfdf5;
        color: #166534;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 16px;
    }

    .publication-title {
        font-size: 30px;
        line-height: 1.35;
        color: #111827;
        margin-bottom: 18px;
    }

    .authors {
        color: #4b5563;
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .authors strong {
        color: #111827;
    }

    .divider {
        height: 1px;
        background: #e5e7eb;
        margin: 25px 0;
    }

    .section-title {
        font-size: 17px;
        color: #111827;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .abstract {
        color: #4b5563;
        font-size: 15px;
        line-height: 1.8;
        white-space: pre-line;
    }

    .citation {
        background: #f8fafc;
        border-left: 4px solid #166534;
        padding: 16px 18px;
        color: #4b5563;
        line-height: 1.7;
        font-size: 14px;
        border-radius: 0 7px 7px 0;
    }

    .sidebar-card {
        overflow: hidden;
    }

    .sidebar-title {
        background: #166534;
        color: #fff;
        padding: 17px 20px;
        font-size: 16px;
        font-weight: 700;
    }

    .details {
        padding: 8px 20px 18px;
    }

    .detail-item {
        padding: 15px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        display: block;
        font-size: 12px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 5px;
    }

    .detail-value {
        font-size: 14px;
        color: #111827;
        font-weight: 600;
        word-break: break-word;
    }

    .status-badge {
        display: inline-flex;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-published {
        background: #dcfce7;
        color: #166534;
    }

    .status-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .resource-card {
        margin-top: 24px;
        padding: 22px;
    }

    .resource-card h3 {
        font-size: 16px;
        margin-bottom: 15px;
        color: #111827;
    }

    .resource-links {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .resource-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 7px;
        color: #166534;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .resource-link:hover {
        background: #f0fdf4;
        border-color: #86efac;
    }

    .empty-text {
        color: #9ca3af;
        font-size: 14px;
    }

    @media(max-width: 900px) {
        .publication-layout {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 600px) {
        .main-card {
            padding: 22px;
        }

        .publication-title {
            font-size: 23px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')

<div class="page-header">

    <div>
        <h2>Publication Information</h2>
        <p style="color:#6b7280; margin-top:5px; font-size:14px;">
            View complete publication details
        </p>
    </div>

    <div class="header-actions">

        <a href="{{ route('publications.edit', $publication) }}"
           class="btn btn-primary">
            ✎ Edit Publication
        </a>

        <a href="{{ route('publications.index') }}"
           class="btn btn-light">
            ← Back
        </a>

    </div>

</div>


<div class="publication-layout">

    {{-- Main Publication Content --}}
    <div>

        <div class="card main-card">

            @if($publication->publication_type)
                <span class="publication-type">
                    {{ $publication->publication_type }}
                </span>
            @endif

            <h1 class="publication-title">
                {{ $publication->title }}
            </h1>

            @if($publication->authors)
                <div class="authors">
                    <strong>Authors:</strong><br>
                    {{ $publication->authors }}
                </div>
            @endif

            <div class="divider"></div>

            @if($publication->abstract)

                <h3 class="section-title">
                    Abstract
                </h3>

                <div class="abstract">
                    {{ $publication->abstract }}
                </div>

                <div class="divider"></div>

            @endif


            @if($publication->citation)

                <h3 class="section-title">
                    Citation
                </h3>

                <div class="citation">
                    {{ $publication->citation }}
                </div>

            @endif

        </div>


        {{-- External Resources --}}
        @if($publication->doi || $publication->publication_url || $publication->pdf_file)

            <div class="card resource-card">

                <h3>Publication Resources</h3>

                <div class="resource-links">

                    @if($publication->doi)

                        <a
                            href="https://doi.org/{{ $publication->doi }}"
                            target="_blank"
                            class="resource-link"
                        >
                            <span>🔗 DOI</span>
                            <span>↗</span>
                        </a>

                    @endif


                    @if($publication->publication_url)

                        <a
                            href="{{ $publication->publication_url }}"
                            target="_blank"
                            class="resource-link"
                        >
                            <span>🌐 Publication Website</span>
                            <span>↗</span>
                        </a>

                    @endif


                    @if($publication->pdf_file)

                        <a
                            href="{{ asset('storage/' . $publication->pdf_file) }}"
                            target="_blank"
                            class="resource-link"
                        >
                            <span>📄 View PDF</span>
                            <span>↗</span>
                        </a>

                    @endif

                </div>

            </div>

        @endif

    </div>


    {{-- Sidebar Details --}}
    <div class="card sidebar-card">

        <div class="sidebar-title">
            Publication Details
        </div>

        <div class="details">

            <div class="detail-item">
                <span class="detail-label">Journal</span>

                <div class="detail-value">
                    {{ $publication->journal ?? 'Not specified' }}
                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">Year</span>

                <div class="detail-value">
                    {{ $publication->year ?? 'Not specified' }}
                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">Type</span>

                <div class="detail-value">
                    {{ $publication->publication_type ?? 'Not specified' }}
                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">Status</span>

                <div class="detail-value">

                    @if($publication->status === 'Published')

                        <span class="status-badge status-published">
                            Published
                        </span>

                    @else

                        <span class="status-badge status-draft">
                            {{ $publication->status }}
                        </span>

                    @endif

                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">DOI</span>

                <div class="detail-value">
                    {{ $publication->doi ?? 'Not available' }}
                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">Added On</span>

                <div class="detail-value">
                    {{ $publication->created_at?->format('d M Y') }}
                </div>
            </div>


            <div class="detail-item">
                <span class="detail-label">Last Updated</span>

                <div class="detail-value">
                    {{ $publication->updated_at?->format('d M Y') }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection