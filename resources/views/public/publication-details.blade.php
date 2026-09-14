@extends('layouts.public')

@section('title', $publication->title . ' - AG-Lab SUST')

@section('styles')
<style>
    /* ================================
       PAGE HERO
    ================================= */

    .details-hero {
        background: linear-gradient(135deg, #064e3b 0%, #166534 55%, #15803d 100%);
        color: #fff;
        padding: 45px 6% 55px;
    }

    .details-hero-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 25px;
        font-size: 13px;
        color: #bbf7d0;
    }

    .breadcrumb a {
        color: #dcfce7;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .breadcrumb a:hover {
        color: #fff;
    }

    .breadcrumb .separator {
        color: #86efac;
    }

    .hero-type {
        display: inline-block;
        background: rgba(255,255,255,0.14);
        border: 1px solid rgba(255,255,255,0.20);
        color: #dcfce7;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }

    .details-hero h1 {
        max-width: 950px;
        font-size: 36px;
        line-height: 1.35;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .hero-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        color: #d1fae5;
        font-size: 14px;
    }

    .hero-meta-item {
        display: flex;
        align-items: center;
        gap: 7px;
    }


    /* ================================
       MAIN CONTAINER
    ================================= */

    .details-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 45px 20px 75px;
    }

    .details-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 310px;
        gap: 30px;
        align-items: start;
    }


    /* ================================
       MAIN CONTENT
    ================================= */

    .content-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        margin-bottom: 24px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.045);
    }

    .content-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid #f1f5f9;
        background: #fafafa;
    }

    .content-card-header h2 {
        font-size: 18px;
        color: #111827;
        margin: 0;
        font-weight: 700;
    }

    .content-card-body {
        padding: 25px;
    }


    /* ================================
       AUTHORS
    ================================= */

    .authors-box {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        border-radius: 10px;
        padding: 18px;
    }

    .authors-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        background: #166534;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .authors-label {
        color: #6b7280;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .authors-text {
        color: #1f2937;
        font-size: 15px;
        line-height: 1.75;
    }


    /* ================================
       ABSTRACT
    ================================= */

    .abstract-text {
        color: #374151;
        font-size: 15px;
        line-height: 1.9;
        white-space: pre-line;
    }


    /* ================================
       CITATION
    ================================= */

    .citation-box {
        position: relative;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
        padding-right: 120px;
    }

    .citation-text {
        color: #374151;
        font-size: 14px;
        line-height: 1.8;
        white-space: pre-line;
    }

    .copy-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .copy-btn:hover {
        border-color: #16a34a;
        color: #166534;
        background: #f0fdf4;
    }

    .copy-btn.copied {
        background: #166534;
        border-color: #166534;
        color: #fff;
    }


    /* ================================
       RESOURCES
    ================================= */

    .resource-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .resource-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 15px 17px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        transition: 0.2s ease;
    }

    .resource-item:hover {
        border-color: #bbf7d0;
        background: #fafffb;
    }

    .resource-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .resource-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        border-radius: 8px;
        background: #ecfdf5;
        color: #166534;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .resource-name {
        color: #111827;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .resource-description {
        color: #6b7280;
        font-size: 12px;
    }

    .resource-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 13px;
        border-radius: 7px;
        background: #166534;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
        transition: 0.2s ease;
    }

    .resource-btn:hover {
        background: #14532d;
        color: #fff;
        transform: translateY(-1px);
    }

    .resource-btn.secondary {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .resource-btn.secondary:hover {
        background: #dcfce7;
    }


    /* ================================
       SIDEBAR
    ================================= */

    .sidebar-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.045);
    }

    .sidebar-title {
        background: #166534;
        color: #fff;
        padding: 16px 19px;
        font-size: 15px;
        font-weight: 700;
    }

    .sidebar-body {
        padding: 10px 19px 16px;
    }

    .info-item {
        padding: 13px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        display: block;
        color: #6b7280;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .info-value {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        word-break: break-word;
    }

    .info-value a {
        color: #166534;
        text-decoration: none;
    }

    .info-value a:hover {
        text-decoration: underline;
    }


    /* ================================
       BACK BUTTON
    ================================= */

    .back-wrapper {
        margin-top: 10px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 16px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: 0.2s ease;
    }

    .back-btn:hover {
        border-color: #86efac;
        color: #166534;
        background: #f0fdf4;
    }


    /* ================================
       EMPTY INFORMATION
    ================================= */

    .not-available {
        color: #9ca3af;
        font-size: 13px;
        font-style: italic;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 1000px) {

        .details-layout {
            grid-template-columns: 1fr;
        }

        .details-sidebar {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .details-sidebar .sidebar-card {
            margin-bottom: 0;
        }
    }


    @media (max-width: 700px) {

        .details-hero {
            padding: 35px 20px 45px;
        }

        .details-hero h1 {
            font-size: 28px;
        }

        .hero-meta {
            flex-direction: column;
            gap: 9px;
        }

        .details-container {
            padding: 30px 15px 55px;
        }

        .content-card-body {
            padding: 20px;
        }

        .citation-box {
            padding-right: 20px;
            padding-top: 55px;
        }

        .copy-btn {
            top: 15px;
            right: 15px;
        }

        .resource-item {
            align-items: flex-start;
            flex-direction: column;
        }

        .resource-btn {
            width: 100%;
            justify-content: center;
        }

        .details-sidebar {
            display: block;
        }

        .details-sidebar .sidebar-card {
            margin-bottom: 20px;
        }
    }


    @media (max-width: 480px) {

        .details-hero h1 {
            font-size: 24px;
        }

        .breadcrumb {
            font-size: 12px;
        }

        .content-card-header {
            padding: 16px 18px;
        }

        .content-card-body {
            padding: 18px;
        }

        .authors-box {
            padding: 14px;
        }

        .authors-text {
            font-size: 14px;
        }
    }

</style>
@endsection


@section('content')

{{-- ==========================================
     HERO SECTION
========================================== --}}

<section class="details-hero">

    <div class="details-hero-inner">

        <div class="breadcrumb">

            <a href="{{ route('public.outputs') }}">
                Outputs
            </a>

            <span class="separator">/</span>

            <span>
                Publication Details
            </span>

        </div>


        @if($publication->publication_type)

            <span class="hero-type">
                {{ $publication->publication_type }}
            </span>

        @endif


        <h1>
            {{ $publication->title }}
        </h1>


        <div class="hero-meta">

            @if($publication->journal)

                <div class="hero-meta-item">
                    <span>📖</span>
                    <span>{{ $publication->journal }}</span>
                </div>

            @endif


            @if($publication->year)

                <div class="hero-meta-item">
                    <span>📅</span>
                    <span>{{ $publication->year }}</span>
                </div>

            @endif

        </div>

    </div>

</section>


{{-- ==========================================
     MAIN CONTENT
========================================== --}}

<div class="details-container">

    <div class="details-layout">


        {{-- ==================================
             LEFT / MAIN CONTENT
        =================================== --}}

        <main>


            {{-- AUTHORS --}}

            @if($publication->authors)

                <section class="content-card">

                    <div class="content-card-header">
                        <h2>Authors</h2>
                    </div>

                    <div class="content-card-body">

                        <div class="authors-box">

                            <div class="authors-icon">
                                👥
                            </div>

                            <div>

                                <div class="authors-label">
                                    Contributing Authors
                                </div>

                                <div class="authors-text">
                                    {{ $publication->authors }}
                                </div>

                            </div>

                        </div>

                    </div>

                </section>

            @endif


            {{-- ABSTRACT --}}

            @if($publication->abstract)

                <section class="content-card">

                    <div class="content-card-header">
                        <h2>Abstract</h2>
                    </div>

                    <div class="content-card-body">

                        <div class="abstract-text">
                            {{ $publication->abstract }}
                        </div>

                    </div>

                </section>

            @endif


            {{-- CITATION --}}

            @if($publication->citation)

                <section class="content-card">

                    <div class="content-card-header">
                        <h2>Citation</h2>
                    </div>

                    <div class="content-card-body">

                        <div class="citation-box">

                            <div
                                id="citationText"
                                class="citation-text"
                            >
                                {{ $publication->citation }}
                            </div>

                            <button
                                type="button"
                                class="copy-btn"
                                onclick="copyCitation()"
                                id="citationCopyBtn"
                            >
                                📋 Copy
                            </button>

                        </div>

                    </div>

                </section>

            @endif


            {{-- RESOURCES --}}

            @if(
                $publication->doi ||
                $publication->publication_url ||
                $publication->pdf_file
            )

                <section class="content-card">

                    <div class="content-card-header">
                        <h2>Resources</h2>
                    </div>

                    <div class="content-card-body">

                        <div class="resource-list">


                            {{-- DOI --}}

                            @if($publication->doi)

                                <div class="resource-item">

                                    <div class="resource-info">

                                        <div class="resource-icon">
                                            🔗
                                        </div>

                                        <div>

                                            <div class="resource-name">
                                                DOI
                                            </div>

                                            <div class="resource-description">
                                                Digital Object Identifier
                                            </div>

                                        </div>

                                    </div>


                                    <a
                                        href="https://doi.org/{{ ltrim($publication->doi, 'https://doi.org/') }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="resource-btn"
                                    >
                                        View DOI ↗
                                    </a>

                                </div>

                            @endif


                            {{-- PUBLICATION URL --}}

                            @if($publication->publication_url)

                                <div class="resource-item">

                                    <div class="resource-info">

                                        <div class="resource-icon">
                                            🌐
                                        </div>

                                        <div>

                                            <div class="resource-name">
                                                Online Publication
                                            </div>

                                            <div class="resource-description">
                                                View the publication on the external website
                                            </div>

                                        </div>

                                    </div>


                                    <a
                                        href="{{ $publication->publication_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="resource-btn secondary"
                                    >
                                        Visit Website ↗
                                    </a>

                                </div>

                            @endif


                            {{-- PDF --}}

                            @if($publication->pdf_file)

                                <div class="resource-item">

                                    <div class="resource-info">

                                        <div class="resource-icon">
                                            📄
                                        </div>

                                        <div>

                                            <div class="resource-name">
                                                Full Publication PDF
                                            </div>

                                            <div class="resource-description">
                                                View the uploaded publication document
                                            </div>

                                        </div>

                                    </div>


                                    <a
                                        href="{{ asset('storage/' . $publication->pdf_file) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="resource-btn"
                                    >
                                        View PDF ↗
                                    </a>

                                </div>

                            @endif


                        </div>

                    </div>

                </section>

            @endif


            {{-- BACK TO OUTPUTS --}}

            <div class="back-wrapper">

                <a
                    href="{{ route('public.outputs') }}"
                    class="back-btn"
                >
                    ← Back to Outputs
                </a>

            </div>


        </main>


        {{-- ==================================
             RIGHT SIDEBAR
        =================================== --}}

        <aside class="details-sidebar">


            {{-- PUBLICATION INFORMATION --}}

            <div class="sidebar-card">

                <div class="sidebar-title">
                    Publication Information
                </div>

                <div class="sidebar-body">


                    @if($publication->publication_type)

                        <div class="info-item">

                            <span class="info-label">
                                Type
                            </span>

                            <div class="info-value">
                                {{ $publication->publication_type }}
                            </div>

                        </div>

                    @endif


                    @if($publication->year)

                        <div class="info-item">

                            <span class="info-label">
                                Publication Year
                            </span>

                            <div class="info-value">
                                {{ $publication->year }}
                            </div>

                        </div>

                    @endif


                    @if($publication->journal)

                        <div class="info-item">

                            <span class="info-label">
                                Journal
                            </span>

                            <div class="info-value">
                                {{ $publication->journal }}
                            </div>

                        </div>

                    @endif


                    @if($publication->doi)

                        <div class="info-item">

                            <span class="info-label">
                                DOI
                            </span>

                            <div class="info-value">

                                <a
                                    href="https://doi.org/{{ ltrim($publication->doi, 'https://doi.org/') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    {{ $publication->doi }}
                                </a>

                            </div>

                        </div>

                    @endif


                    <div class="info-item">

                        <span class="info-label">
                            Status
                        </span>

                        <div class="info-value">
                            Published
                        </div>

                    </div>


                </div>

            </div>


            {{-- QUICK ACTIONS --}}

            <div class="sidebar-card">

                <div class="sidebar-title">
                    Quick Actions
                </div>

                <div class="sidebar-body">


                    @if($publication->doi)

                        <div class="info-item">

                            <span class="info-label">
                                DOI
                            </span>

                            <div class="info-value">

                                <button
                                    type="button"
                                    onclick="copyDOI()"
                                    class="back-btn"
                                    style="
                                        width:100%;
                                        justify-content:center;
                                        margin-top:5px;
                                        cursor:pointer;
                                    "
                                    id="doiCopyBtn"
                                >
                                    📋 Copy DOI
                                </button>

                            </div>

                        </div>

                    @endif


                    @if($publication->pdf_file)

                        <div class="info-item">

                            <span class="info-label">
                                Document
                            </span>

                            <div class="info-value">

                                <a
                                    href="{{ asset('storage/' . $publication->pdf_file) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="resource-btn"
                                    style="
                                        width:100%;
                                        justify-content:center;
                                        margin-top:5px;
                                    "
                                >
                                    📄 View PDF
                                </a>

                            </div>

                        </div>

                    @endif


                    <div class="info-item">

                        <span class="info-label">
                            Navigation
                        </span>

                        <div class="info-value">

                            <a
                                href="{{ route('public.outputs') }}"
                                class="back-btn"
                                style="
                                    width:100%;
                                    justify-content:center;
                                    margin-top:5px;
                                "
                            >
                                ← All Publications
                            </a>

                        </div>

                    </div>


                </div>

            </div>


        </aside>

    </div>

</div>


{{-- ==========================================
     COPY FUNCTIONS
========================================== --}}

<script>

    function copyText(text, button, defaultText) {

        navigator.clipboard.writeText(text).then(function () {

            button.textContent = '✓ Copied';

            button.classList.add('copied');

            setTimeout(function () {

                button.textContent = defaultText;

                button.classList.remove('copied');

            }, 1800);

        }).catch(function () {

            alert('Unable to copy. Please copy the text manually.');

        });

    }


    function copyCitation() {

        const textElement =
            document.getElementById('citationText');

        const button =
            document.getElementById('citationCopyBtn');

        if (!textElement || !button) {
            return;
        }

        copyText(
            textElement.innerText,
            button,
            '📋 Copy'
        );

    }


    function copyDOI() {

        const doi = @json($publication->doi);

        const button =
            document.getElementById('doiCopyBtn');

        if (!doi || !button) {
            return;
        }

        copyText(
            doi,
            button,
            '📋 Copy DOI'
        );

    }

</script>

@endsection