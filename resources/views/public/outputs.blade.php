@extends('layouts.public')

@section('title', 'Publications & Research Outputs')

@section('styles')

<style>

/* =========================================================
   PAGE
========================================================= */

.publications-page {
    background: #f7faf8;
    color: #123524;
}


/* =========================================================
   HERO
========================================================= */

.publication-hero {
    position: relative;
    overflow: hidden;

    background:
        radial-gradient(
            circle at 82% 65%,
            rgba(64, 170, 105, 0.13),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #064b29 0%,
            #075d32 50%,
            #0b6939 100%
        );

    color: #ffffff;

    min-height: 510px;
}


/* Decorative circles */

.publication-hero::before {
    content: "";

    position: absolute;

    width: 430px;
    height: 430px;

    right: -150px;
    bottom: -280px;

    border: 1px solid rgba(255,255,255,0.10);

    border-radius: 50%;
}


.publication-hero::after {
    content: "";

    position: absolute;

    width: 520px;
    height: 520px;

    left: -350px;
    bottom: -390px;

    border: 1px solid rgba(255,255,255,0.08);

    border-radius: 50%;
}


/* Hero container */

.publication-hero-container {
    position: relative;

    z-index: 2;

    max-width: 1240px;

    margin: 0 auto;

    padding: 24px 28px 88px;

    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        minmax(470px, 0.95fr);

    align-items: center;

    gap: 55px;
}


/* =========================================================
   HERO CONTENT
========================================================= */

.publication-hero-content {
    padding-top: 4px;
}


/* Breadcrumb */

.publication-breadcrumb {
    display: flex;

    align-items: center;

    gap: 9px;

    margin-bottom: 24px;

    font-size: 13px;

    color: rgba(255,255,255,0.72);
}


.publication-breadcrumb a {
    color: rgba(255,255,255,0.82);

    text-decoration: none;

    transition: 0.2s ease;
}


.publication-breadcrumb a:hover {
    color: #8ff0b5;
}


.publication-breadcrumb strong {
    color: #ffffff;
}


/* Badge */

.publication-badge {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding: 8px 15px;

    margin-bottom: 17px;

    border: 1px solid rgba(148,239,181,0.28);

    border-radius: 999px;

    background: rgba(255,255,255,0.055);

    color: #8ff0b5;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 1px;
}


.publication-badge span {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #81e9a8;

    box-shadow:
        0 0 0 4px rgba(129,233,168,0.10);
}


/* Hero title */

.publication-hero h1 {
    max-width: 700px;

    margin: 0 0 22px;

    font-family:
        Arial,
        Helvetica,
        sans-serif;

    font-size: clamp(48px, 5vw, 70px);

    line-height: 1.04;

    letter-spacing: -2.5px;

    font-weight: 800;

    color: #ffffff;
}


.publication-hero h1 span {
    color: #83edaf;
}


/* Hero description */

.publication-hero-content > p {
    max-width: 690px;

    margin: 0;

    font-size: 16px;

    line-height: 1.8;

    color: rgba(255,255,255,0.90);
}


/* =========================================================
   STATISTICS CARD
========================================================= */

.publication-stat-box {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 22px 50px rgba(0,0,0,0.17);
    border: 1px solid rgba(255,255,255,0.85);
    transform: translate(70px, 100px);
}

@media (max-width: 1050px) {
    .publication-stat-box {
        max-width: 760px;
        margin: 0 auto;
        transform: translateY(20px);
    }
}

@media (max-width: 480px) {
    .publication-stat-box {
        transform: translateY(0);
    }
}


.publication-stat {
    min-height: 150px;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    text-align: center;

    padding: 25px 15px;

    background: #ffffff;
}


.publication-stat + .publication-stat {
    border-left: 1px solid #e2e8e4;
}


/* Stat icon */

.stat-icon {
    width: 51px;
    height: 51px;

    display: flex;

    align-items: center;

    justify-content: center;

    margin-bottom: 15px;

    border-radius: 12px;

    background: #e3f7ec;

    color: #08713d;
}


.stat-icon svg {
    width: 25px;
    height: 25px;
}


/* Stat number */

.stat-number {
    margin-bottom: 9px;

    font-size: 30px;

    line-height: 1;

    font-weight: 800;

    color: #086633;
}


/* Stat label */

.stat-label {
    font-size: 10px;

    font-weight: 700;

    letter-spacing: 0.8px;

    color: #64746b;

    white-space: nowrap;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.publications-main {
    max-width: 1240px;

    margin: 0 auto;

    padding: 55px 28px 80px;

    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        310px;

    gap: 28px;
}


/* =========================================================
   SEARCH
========================================================= */

.publication-search-box {
    background: #ffffff;

    border: 1px solid #e1e9e4;

    border-radius: 12px;

    padding: 17px;

    margin-bottom: 28px;

    box-shadow:
        0 7px 20px rgba(19,53,36,0.05);
}


.publication-search-form {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        170px
        98px;

    gap: 10px;
}


.publication-search-form input,
.publication-search-form select {
    width: 100%;

    height: 44px;

    border: 1px solid #ccd9d2;

    border-radius: 7px;

    padding: 0 13px;

    background: #ffffff;

    color: #243b2e;

    font-size: 13px;

    outline: none;

    transition: 0.2s ease;
}


.publication-search-form input:focus,
.publication-search-form select:focus {
    border-color: #16834b;

    box-shadow:
        0 0 0 3px rgba(22,131,75,0.08);
}


.publication-search-button {
    height: 44px;

    border: none;

    border-radius: 7px;

    background: #126d3b;

    color: #ffffff;

    font-size: 13px;

    font-weight: 700;

    cursor: pointer;

    transition: 0.2s ease;
}


.publication-search-button:hover {
    background: #0c5b31;

    transform: translateY(-1px);
}


/* =========================================================
   PUBLICATION HEADER
========================================================= */

.publication-results-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 20px;
}


.publication-results-header h2 {
    margin: 0;

    font-size: 22px;

    color: #102f20;
}


.publication-results-count {
    font-size: 12px;

    color: #718177;
}


/* =========================================================
   YEAR SECTION
========================================================= */

.publication-year-section {
    margin-bottom: 34px;
}


.publication-year-heading {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-bottom: 15px;
}


.publication-year-heading h3 {
    margin: 0;

    font-size: 23px;

    color: #08703c;
}


.publication-year-line {
    flex: 1;

    height: 1px;

    background: #cfe9da;
}


.publication-year-count {
    padding: 5px 11px;

    border-radius: 999px;

    background: #dcf8e8;

    color: #08703c;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;
}


/* =========================================================
   PUBLICATION CARD
========================================================= */

.publication-card {
    position: relative;

    background: #ffffff;

    border: 1px solid #dfe8e3;

    border-radius: 12px;

    padding: 22px 20px;

    margin-bottom: 14px;

    box-shadow:
        0 5px 18px rgba(20,54,37,0.045);

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease,
        border-color 0.2s ease;
}


.publication-card:hover {
    transform: translateY(-2px);

    border-color: #c6ddd0;

    box-shadow:
        0 10px 25px rgba(20,54,37,0.08);
}


/* Journal/type */

.publication-meta-top {
    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 8px;

    margin-bottom: 9px;
}


.publication-type {
    display: inline-flex;

    align-items: center;

    padding: 4px 8px;

    border-radius: 5px;

    background: #e4f8ed;

    color: #08703c;

    font-size: 9px;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: 0.4px;
}


.publication-journal {
    font-size: 11px;

    color: #718177;
}


/* Title */

.publication-card-title {
    display: block;

    margin-bottom: 10px;

    color: #102b1e;

    text-decoration: none;

    font-size: 16px;

    line-height: 1.45;

    font-weight: 750;

    transition: 0.2s ease;
}


.publication-card-title:hover {
    color: #08703c;
}


/* Authors */

.publication-authors {
    margin-bottom: 12px;

    font-size: 12px;

    line-height: 1.6;

    color: #50645a;
}


.publication-authors strong {
    color: #213f30;
}


/* Citation */

.publication-citation {
    padding-top: 11px;

    border-top: 1px solid #edf2ef;

    color: #63746b;

    font-size: 11px;

    line-height: 1.65;
}


/* DOI */

.publication-doi {
    margin-top: 10px;

    font-size: 10px;

    color: #688076;
}


.publication-doi strong {
    color: #3c5d4e;
}


/* View button */

.publication-view-link {
    display: flex;

    justify-content: flex-end;

    margin-top: 9px;
}


.publication-view-link a {
    color: #08703c;

    font-size: 11px;

    font-weight: 700;

    text-decoration: none;

    transition: 0.2s ease;
}


.publication-view-link a:hover {
    color: #064e2b;

    transform: translateX(2px);
}


/* =========================================================
   SIDEBAR
========================================================= */

.publication-sidebar {
    display: flex;

    flex-direction: column;

    gap: 20px;
}


.publication-sidebar-card {
    background: #ffffff;

    border: 1px solid #dfe8e3;

    border-radius: 12px;

    overflow: hidden;

    box-shadow:
        0 5px 18px rgba(20,54,37,0.045);
}


.publication-sidebar-title {
    padding: 14px 16px;

    background: #116d3b;

    color: #ffffff;

    font-size: 14px;

    font-weight: 700;
}


.publication-sidebar-body {
    padding: 14px;
}


/* Browse year */

.browse-all-years {
    display: flex;

    align-items: center;

    justify-content: center;

    width: 100%;

    padding: 9px 10px;

    margin-bottom: 9px;

    border: 1px solid #bfead0;

    border-radius: 7px;

    background: #ffffff;

    color: #08703c;

    font-size: 10px;

    font-weight: 700;

    text-decoration: none;
}


.browse-year-list {
    list-style: none;

    padding: 0;

    margin: 0;
}


.browse-year-list li {
    border-bottom: 1px solid #edf2ef;
}


.browse-year-list li:last-child {
    border-bottom: none;
}


.browse-year-list a {
    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 11px 5px;

    color: #344d40;

    text-decoration: none;

    font-size: 12px;

    transition: 0.2s ease;
}


.browse-year-list a:hover {
    color: #08703c;

    padding-left: 9px;
}


.browse-year-name {
    display: flex;

    align-items: center;

    gap: 8px;
}


.browse-year-dot {
    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: #65d993;
}


.browse-year-number {
    min-width: 23px;

    padding: 3px 7px;

    border-radius: 999px;

    background: #f0f4f2;

    color: #75847c;

    text-align: center;

    font-size: 9px;

    font-weight: 700;
}


/* =========================================================
   AT A GLANCE
========================================================= */

.glance-item {
    padding: 13px 7px;

    border-bottom: 1px solid #edf2ef;
}


.glance-item:last-child {
    border-bottom: none;
}


.glance-label {
    margin-bottom: 6px;

    color: #839087;

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 0.7px;

    text-transform: uppercase;
}


.glance-value {
    color: #1c3a2b;

    font-size: 14px;

    font-weight: 750;
}


/* =========================================================
   RESEARCH OUTPUTS INFO
========================================================= */

.research-output-info {
    background: #edf9f2;

    border: 1px solid #d4eddf;

    border-radius: 12px;

    padding: 20px;

    margin-top: 5px;
}


.research-output-info h3 {
    margin: 0 0 9px;

    color: #08703c;

    font-size: 16px;
}


.research-output-info p {
    margin: 0;

    color: #50665a;

    font-size: 12px;

    line-height: 1.75;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.publication-empty {
    padding: 50px 25px;

    text-align: center;

    background: #ffffff;

    border: 1px dashed #cbdad1;

    border-radius: 12px;
}


.publication-empty-icon {
    width: 55px;
    height: 55px;

    display: flex;

    align-items: center;

    justify-content: center;

    margin: 0 auto 15px;

    border-radius: 50%;

    background: #e5f7ed;

    color: #08703c;
}


.publication-empty h3 {
    margin: 0 0 7px;

    font-size: 18px;

    color: #1d3a2c;
}


.publication-empty p {
    margin: 0;

    color: #738078;

    font-size: 12px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1050px) {

    .publication-hero-container {
        grid-template-columns: 1fr;

        gap: 35px;

        padding-bottom: 70px;
    }

    .publication-hero-content {
        text-align: center;
    }

    .publication-breadcrumb {
        justify-content: center;
    }

    .publication-hero h1,
    .publication-hero-content > p {
        margin-left: auto;
        margin-right: auto;
    }

    .publication-stat-box {
        max-width: 760px;

        margin: 0 auto;
    }

    .publications-main {
        grid-template-columns: 1fr;
    }

    .publication-sidebar {
        display: grid;

        grid-template-columns: repeat(2, 1fr);
    }
}


@media (max-width: 700px) {

    .publication-hero-container {
        padding:
            22px 18px 65px;
    }

    .publication-hero h1 {
        font-size: 43px;

        letter-spacing: -1.5px;
    }

    .publication-hero-content > p {
        font-size: 14px;

        line-height: 1.7;
    }

    .publications-main {
        padding:
            40px 18px 60px;
    }

    .publication-search-form {
        grid-template-columns: 1fr;
    }

    .publication-search-button {
        width: 100%;
    }

    .publication-sidebar {
        grid-template-columns: 1fr;
    }
}


@media (max-width: 650px) {

    .publication-stat {
        min-height: 155px;

        padding: 20px 8px;
    }

    .stat-icon {
        width: 43px;
        height: 43px;

        margin-bottom: 11px;
    }

    .stat-icon svg {
        width: 21px;
        height: 21px;
    }

    .stat-number {
        font-size: 25px;
    }

    .stat-label {
        font-size: 8px;
    }

    .publication-card {
        padding: 18px 15px;
    }
}


@media (max-width: 480px) {

    .publication-hero h1 {
        font-size: 36px;
    }

    .publication-stat-box {
        grid-template-columns: 1fr;
    }

    .publication-stat {
        min-height: 125px;
    }

    .publication-stat + .publication-stat {
        border-left: none;

        border-top: 1px solid #e2e8e4;
    }

    .publication-year-heading {
        gap: 8px;
    }

    .publication-year-heading h3 {
        font-size: 20px;
    }

    .publication-year-count {
        font-size: 9px;

        padding: 4px 8px;
    }
}

</style>

@endsection


@section('content')

<div class="publications-page">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="publication-hero">

        <div class="publication-hero-container">


            {{-- LEFT SIDE --}}

            <div class="publication-hero-content">


                {{-- Breadcrumb --}}

                <div class="publication-breadcrumb">

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span>/</span>

                    <a href="{{ route('public.outputs') }}">
                        Outputs
                    </a>

                    <span>/</span>

                    <strong>
                        Publications
                    </strong>

                </div>


                {{-- Badge --}}

                <div class="publication-badge">

                    <span></span>

                    RESEARCH OUTPUTS

                </div>


                {{-- Heading --}}

                <h1>

                    Publications &

                    <span>
                        Research Outputs
                    </span>

                </h1>


                {{-- Description --}}

                <p>
                    Explore research publications from the Laboratory of Genomics and
                    Transcriptomics, organized by year with access to publication details,
                    DOI references, external links and available PDF documents.
                </p>

            </div>


            {{-- RIGHT SIDE STATISTICS --}}

            <div class="publication-stat-box">


                {{-- TOTAL PUBLICATIONS --}}

                <div class="publication-stat">

                    <div class="stat-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <path
                                d="M6 3H15L19 7V21H6V3Z"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M14 3V8H19"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linejoin="round"
                            />

                            <path
                                d="M9 12H16"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M9 16H16"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                        </svg>

                    </div>


                    <div class="stat-number">
                        {{ $totalPublications }}
                    </div>


                    <div class="stat-label">
                        TOTAL PUBLICATIONS
                    </div>

                </div>


                {{-- ACTIVE YEARS --}}

                <div class="publication-stat">

                    <div class="stat-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="16"
                                rx="2"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />

                            <path
                                d="M7 3V7"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M17 3V7"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M3 10H21"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />

                            <path
                                d="M8 14H8.01"
                                stroke="currentColor"
                                stroke-width="2.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M12 14H12.01"
                                stroke="currentColor"
                                stroke-width="2.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M16 14H16.01"
                                stroke="currentColor"
                                stroke-width="2.8"
                                stroke-linecap="round"
                            />

                        </svg>

                    </div>


                    <div class="stat-number">
                        {{ $activeYears }}
                    </div>


                    <div class="stat-label">
                        ACTIVE YEARS
                    </div>

                </div>


                {{-- JUMP TO YEAR --}}

                <div class="publication-stat">

                    <div class="stat-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="16"
                                rx="2"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />

                            <path
                                d="M7 3V7"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M17 3V7"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                            <path
                                d="M3 10H21"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />

                            <circle
                                cx="16.5"
                                cy="16.5"
                                r="3.5"
                                stroke="currentColor"
                                stroke-width="1.6"
                            />

                            <path
                                d="M16.5 14.8V16.6L17.7 17.4"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>


                    <div class="stat-number">
                        {{ $latestYear ?? '—' }}
                    </div>


                    <div class="stat-label">
                        LATEST YEAR
                    </div>

                </div>


            </div>

        </div>

    </section>



    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="publications-main">


        {{-- =================================================
             LEFT CONTENT
        ================================================== --}}

        <div class="publications-content">


            {{-- SEARCH --}}

            <div class="publication-search-box">

                <form
                    method="GET"
                    action="{{ route('public.outputs') }}"
                    class="publication-search-form"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search publications, authors, journals or DOI..."
                    >


                    <select name="year">

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


                    <button
                        type="submit"
                        class="publication-search-button"
                    >

                        🔍 Search

                    </button>

                </form>

            </div>



            {{-- RESULTS HEADER --}}

            <div class="publication-results-header">

                <h2>
                    Publications
                </h2>

                <div class="publication-results-count">

                    {{ $publications->count() }}

                    published publication(s)

                </div>

            </div>



            {{-- =================================================
                 PUBLICATIONS
            ================================================== --}}

            @if($groupedPublications->count() > 0)


                @foreach($groupedPublications as $year => $yearPublications)

                    <section
                        class="publication-year-section"
                        id="year-{{ $year }}"
                    >


                        {{-- YEAR TITLE --}}

                        <div class="publication-year-heading">

                            <h3>
                                {{ $year }}
                            </h3>

                            <div class="publication-year-line"></div>

                            <span class="publication-year-count">

                                {{ $yearPublications->count() }}

                                {{ $yearPublications->count() == 1 ? 'Publication' : 'Publications' }}

                            </span>

                        </div>



                        {{-- PUBLICATION CARDS --}}

                        @foreach($yearPublications as $publication)

                            <article class="publication-card">


                                {{-- Journal / Type --}}

                                <div class="publication-meta-top">

                                    @if($publication->publication_type)

                                        <span class="publication-type">

                                            {{ $publication->publication_type }}

                                        </span>

                                    @endif


                                    @if($publication->journal)

                                        <span class="publication-journal">

                                            {{ $publication->journal }}

                                        </span>

                                    @endif

                                </div>



                                {{-- Title --}}

                                <a
                                    href="{{ route('public.publication.show', $publication) }}"
                                    class="publication-card-title"
                                >

                                    {{ $publication->title }}

                                </a>



                                {{-- Authors --}}

                                @if($publication->authors)

                                    <div class="publication-authors">

                                        <strong>
                                            Authors:
                                        </strong>

                                        {{ $publication->authors }}

                                    </div>

                                @endif



                                {{-- Citation --}}

                                @if($publication->citation)

                                    <div class="publication-citation">

                                        {{ $publication->citation }}

                                    </div>

                                @endif



                                {{-- DOI --}}

                                @if($publication->doi)

                                    <div class="publication-doi">

                                        <strong>
                                            DOI:
                                        </strong>

                                        {{ $publication->doi }}

                                    </div>

                                @endif



                                {{-- View Publication --}}

                                <div class="publication-view-link">

                                    <a
                                        href="{{ route('public.publication.show', $publication) }}"
                                    >

                                        View Publication →

                                    </a>

                                </div>


                            </article>

                        @endforeach


                    </section>

                @endforeach


            @else


                {{-- EMPTY STATE --}}

                <div class="publication-empty">

                    <div class="publication-empty-icon">

                        <svg
                            width="25"
                            height="25"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <circle
                                cx="11"
                                cy="11"
                                r="7"
                                stroke="currentColor"
                                stroke-width="1.8"
                            />

                            <path
                                d="M16 16L21 21"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                            />

                        </svg>

                    </div>


                    <h3>
                        No Publications Found
                    </h3>


                    <p>
                        Try changing your search keyword or year filter.
                    </p>

                </div>

            @endif



            {{-- =================================================
                 RESEARCH OUTPUTS
            ================================================== --}}

            <div class="research-output-info">

                <h3>
                    Research Outputs
                </h3>

                <p>
                    Explore the laboratory's research publications and scholarly
                    outputs organized by publication year. Each publication may
                    include authors, journal information, DOI references,
                    external publication links and available PDF documents.
                </p>

            </div>


        </div>



        {{-- =================================================
             RIGHT SIDEBAR
        ================================================== --}}

        <aside class="publication-sidebar">


            {{-- =================================================
                 BROWSE BY YEAR
            ================================================== --}}

            <div class="publication-sidebar-card">

                <div class="publication-sidebar-title">

                    Browse by Year

                </div>


                <div class="publication-sidebar-body">


                    <a
                        href="{{ route('public.outputs') }}"
                        class="browse-all-years"
                    >

                        View All Years

                    </a>


                    <ul class="browse-year-list">

                        @foreach($years as $year)

                            <li>

                                <a
                                    href="{{ route('public.outputs', ['year' => $year]) }}"
                                >

                                    <span class="browse-year-name">

                                        <span class="browse-year-dot"></span>

                                        {{ $year }}

                                    </span>


                                    <span class="browse-year-number">

                                        {{ $yearCounts[$year] ?? 0 }}

                                    </span>

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>



            {{-- =================================================
                 AT A GLANCE
            ================================================== --}}

            <div class="publication-sidebar-card">

                <div class="publication-sidebar-title">

                    At a Glance

                </div>


                <div class="publication-sidebar-body">


                    <div class="glance-item">

                        <div class="glance-label">
                            Publications
                        </div>

                        <div class="glance-value">
                            {{ $totalPublications }}
                        </div>

                    </div>


                    <div class="glance-item">

                        <div class="glance-label">
                            Active Years
                        </div>

                        <div class="glance-value">
                            {{ $activeYears }}
                        </div>

                    </div>


                    <div class="glance-item">

                        <div class="glance-label">
                            Latest Publication Year
                        </div>

                        <div class="glance-value">
                            {{ $latestYear ?? '—' }}
                        </div>

                    </div>


                    <div class="glance-item">

                        <div class="glance-label">
                            Earliest Publication Year
                        </div>

                        <div class="glance-value">
                            {{ $earliestYear ?? '—' }}
                        </div>

                    </div>


                </div>

            </div>


        </aside>


    </main>

</div>

@endsection