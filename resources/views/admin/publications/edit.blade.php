@extends('layouts.admin')

@section('title', 'Edit Publication')

@section('content')

<style>
    .publication-form-page {
        padding-bottom: 40px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .form-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 24px;
        align-items: start;
    }

    .form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        margin-bottom: 20px;
    }

    .section-header {
        padding: 18px 22px;
        border-bottom: 1px solid #e5e7eb;
        background: #fafafa;
    }

    .section-header h2 {
        margin: 0;
        font-size: 16px;
        color: #111827;
    }

    .section-header p {
        margin: 5px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .form-body {
        padding: 22px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #374151;
        font-size: 12px;
        font-weight: 700;
    }

    .required {
        color: #dc2626;
    }

    .form-control {
        width: 100%;
        min-height: 43px;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        background: #fff;
        color: #111827;
        font-size: 13px;
        outline: none;
        transition: .2s ease;
        font-family: inherit;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
        line-height: 1.6;
    }

    textarea.abstract-field {
        min-height: 190px;
    }

    .form-control:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, .10);
    }

    .form-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
    }

    .error-text {
        margin-top: 6px;
        color: #dc2626;
        font-size: 11px;
    }

    .has-error {
        border-color: #fca5a5;
    }

    /* CURRENT PDF */

    .current-file {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 14px;
        margin-bottom: 15px;
        border: 1px solid #bbf7d0;
        border-radius: 9px;
        background: #f0fdf4;
    }

    .file-info {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
    }

    .file-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 8px;
        background: #166534;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .file-name {
        color: #166534;
        font-size: 13px;
        font-weight: 700;
        word-break: break-word;
    }

    .file-label {
        color: #6b7280;
        font-size: 11px;
        margin-top: 3px;
    }

    .view-file-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 7px;
        background: #fff;
        border: 1px solid #bbf7d0;
        color: #166534;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .view-file-btn:hover {
        background: #dcfce7;
    }

    /* PDF UPLOAD */

    .upload-box {
        border: 1.5px dashed #cbd5e1;
        border-radius: 9px;
        padding: 22px;
        background: #f8fafc;
        text-align: center;
        transition: .2s ease;
    }

    .upload-box:hover {
        border-color: #86efac;
        background: #f0fdf4;
    }

    .upload-icon {
        width: 45px;
        height: 45px;
        margin: 0 auto 10px;
        border-radius: 50%;
        background: #ecfdf5;
        color: #166534;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .upload-box input[type="file"] {
        width: 100%;
        max-width: 400px;
        margin-top: 10px;
        font-size: 12px;
    }

    /* SIDEBAR */

    .side-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        margin-bottom: 20px;
    }

    .side-title {
        background: #166534;
        color: #fff;
        padding: 15px 18px;
        font-size: 14px;
        font-weight: 700;
    }

    .side-body {
        padding: 17px;
    }

    .side-body p {
        color: #6b7280;
        font-size: 12px;
        line-height: 1.7;
        margin: 0 0 12px;
    }

    .side-list {
        padding-left: 17px;
        margin: 0;
    }

    .side-list li {
        color: #6b7280;
        font-size: 12px;
        line-height: 1.7;
        margin-bottom: 7px;
    }

    .side-list li:last-child {
        margin-bottom: 0;
    }

    .record-info {
        padding: 11px;
        border-radius: 7px;
        background: #f8fafc;
        margin-bottom: 8px;
    }

    .record-info:last-child {
        margin-bottom: 0;
    }

    .record-label {
        display: block;
        color: #9ca3af;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 3px;
    }

    .record-value {
        color: #374151;
        font-size: 12px;
        font-weight: 700;
        word-break: break-word;
    }

    /* BUTTONS */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        padding-top: 5px;
    }

    .btn {
        min-height: 42px;
        padding: 0 17px;
        border-radius: 7px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-primary {
        border: none;
        background: #166534;
        color: #fff;
    }

    .btn-primary:hover {
        background: #14532d;
    }

    .btn-secondary {
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #f9fafb;
        border-color: #9ca3af;
    }

    /* VALIDATION */

    .error-summary {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 9px;
        padding: 15px 18px;
        margin-bottom: 20px;
        color: #991b1b;
        font-size: 13px;
    }

    .error-summary strong {
        display: block;
        margin-bottom: 7px;
    }

    .error-summary ul {
        margin: 0;
        padding-left: 18px;
    }

    .error-summary li {
        margin-bottom: 4px;
    }

    /* RESPONSIVE */

    @media (max-width: 1000px) {
        .form-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .form-body {
            padding: 18px;
        }

        .current-file {
            align-items: flex-start;
            flex-direction: column;
        }

        .view-file-btn {
            width: 100%;
            justify-content: center;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>


<div class="publication-form-page">

    {{-- PAGE HEADER --}}

    <div class="page-header">

        <h1>Edit Publication</h1>

        <p>
            Update the information and resources for this publication.
        </p>

    </div>


    {{-- VALIDATION ERRORS --}}

    @if($errors->any())

        <div class="error-summary">

            <strong>
                Please correct the following errors:
            </strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('publications.update', $publication) }}"
        enctype="multipart/form-data"
    >

        @csrf

        @method('PUT')


        <div class="form-layout">


            {{-- ==========================================
                 MAIN FORM
            =========================================== --}}

            <div>


                {{-- BASIC INFORMATION --}}

                <div class="form-card">

                    <div class="section-header">

                        <h2>
                            Basic Information
                        </h2>

                        <p>
                            Update the main bibliographic information.
                        </p>

                    </div>


                    <div class="form-body">

                        <div class="form-grid">


                            {{-- TITLE --}}

                            <div class="form-group full-width">

                                <label for="title">
                                    Publication Title
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    class="form-control @error('title') has-error @enderror"
                                    value="{{ old('title', $publication->title) }}"
                                    placeholder="Enter the full publication title"
                                    required
                                >

                                @error('title')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- AUTHORS --}}

                            <div class="form-group full-width">

                                <label for="authors">
                                    Authors
                                </label>

                                <textarea
                                    id="authors"
                                    name="authors"
                                    class="form-control @error('authors') has-error @enderror"
                                    placeholder="Enter author names, separated by commas"
                                >{{ old('authors', $publication->authors) }}</textarea>

                                <div class="form-help">
                                    Example: Author One, Author Two, Author Three
                                </div>

                                @error('authors')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- JOURNAL --}}

                            <div class="form-group">

                                <label for="journal">
                                    Journal / Conference
                                </label>

                                <input
                                    type="text"
                                    id="journal"
                                    name="journal"
                                    class="form-control @error('journal') has-error @enderror"
                                    value="{{ old('journal', $publication->journal) }}"
                                    placeholder="Enter journal or conference name"
                                >

                                @error('journal')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- YEAR --}}

                            <div class="form-group">

                                <label for="year">
                                    Publication Year
                                </label>

                                <input
                                    type="number"
                                    id="year"
                                    name="year"
                                    class="form-control @error('year') has-error @enderror"
                                    value="{{ old('year', $publication->year) }}"
                                    min="1900"
                                    max="2100"
                                    placeholder="e.g. 2025"
                                >

                                @error('year')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- TYPE --}}

                            <div class="form-group">

                                <label for="publication_type">
                                    Publication Type
                                </label>

                                <select
                                    id="publication_type"
                                    name="publication_type"
                                    class="form-control @error('publication_type') has-error @enderror"
                                >

                                    <option value="">
                                        Select publication type
                                    </option>

                                    <option
                                        value="Research Article"
                                        {{ old('publication_type', $publication->publication_type) == 'Research Article' ? 'selected' : '' }}
                                    >
                                        Research Article
                                    </option>

                                    <option
                                        value="Review Article"
                                        {{ old('publication_type', $publication->publication_type) == 'Review Article' ? 'selected' : '' }}
                                    >
                                        Review Article
                                    </option>

                                    <option
                                        value="Conference Paper"
                                        {{ old('publication_type', $publication->publication_type) == 'Conference Paper' ? 'selected' : '' }}
                                    >
                                        Conference Paper
                                    </option>

                                    <option
                                        value="Book Chapter"
                                        {{ old('publication_type', $publication->publication_type) == 'Book Chapter' ? 'selected' : '' }}
                                    >
                                        Book Chapter
                                    </option>

                                    <option
                                        value="Other"
                                        {{ old('publication_type', $publication->publication_type) == 'Other' ? 'selected' : '' }}
                                    >
                                        Other
                                    </option>

                                </select>

                                @error('publication_type')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- STATUS --}}

                            <div class="form-group">

                                <label for="status">
                                    Publication Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    class="form-control @error('status') has-error @enderror"
                                >

                                    <option
                                        value="Published"
                                        {{ old('status', $publication->status) == 'Published' ? 'selected' : '' }}
                                    >
                                        Published
                                    </option>

                                    <option
                                        value="Draft"
                                        {{ old('status', $publication->status) == 'Draft' ? 'selected' : '' }}
                                    >
                                        Draft
                                    </option>

                                </select>

                                @error('status')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                {{-- IDENTIFIERS & LINKS --}}

                <div class="form-card">

                    <div class="section-header">

                        <h2>
                            Identifiers & Links
                        </h2>

                        <p>
                            Update DOI and external publication references.
                        </p>

                    </div>


                    <div class="form-body">

                        <div class="form-grid">


                            {{-- DOI --}}

                            <div class="form-group">

                                <label for="doi">
                                    DOI
                                </label>

                                <input
                                    type="text"
                                    id="doi"
                                    name="doi"
                                    class="form-control @error('doi') has-error @enderror"
                                    value="{{ old('doi', $publication->doi) }}"
                                    placeholder="10.xxxx/xxxxx"
                                >

                                <div class="form-help">
                                    Example: 10.1234/example.2025.001
                                </div>

                                @error('doi')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- PUBLICATION URL --}}

                            <div class="form-group">

                                <label for="publication_url">
                                    Publication URL
                                </label>

                                <input
                                    type="url"
                                    id="publication_url"
                                    name="publication_url"
                                    class="form-control @error('publication_url') has-error @enderror"
                                    value="{{ old('publication_url', $publication->publication_url) }}"
                                    placeholder="https://example.com/publication"
                                >

                                <div class="form-help">
                                    Link to the journal or publisher page.
                                </div>

                                @error('publication_url')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                {{-- ABSTRACT & CITATION --}}

                <div class="form-card">

                    <div class="section-header">

                        <h2>
                            Abstract & Citation
                        </h2>

                        <p>
                            Update the scholarly description and citation.
                        </p>

                    </div>


                    <div class="form-body">

                        <div class="form-grid">


                            {{-- ABSTRACT --}}

                            <div class="form-group full-width">

                                <label for="abstract">
                                    Abstract
                                </label>

                                <textarea
                                    id="abstract"
                                    name="abstract"
                                    class="form-control abstract-field @error('abstract') has-error @enderror"
                                    placeholder="Enter the publication abstract..."
                                >{{ old('abstract', $publication->abstract) }}</textarea>

                                @error('abstract')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- CITATION --}}

                            <div class="form-group full-width">

                                <label for="citation">
                                    Citation
                                </label>

                                <textarea
                                    id="citation"
                                    name="citation"
                                    class="form-control @error('citation') has-error @enderror"
                                    placeholder="Enter the formatted citation..."
                                >{{ old('citation', $publication->citation) }}</textarea>

                                <div class="form-help">
                                    Example: Author(s). (Year). Title. Journal, Volume(Issue), Pages.
                                </div>

                                @error('citation')

                                    <div class="error-text">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                {{-- PDF DOCUMENT --}}

                <div class="form-card">

                    <div class="section-header">

                        <h2>
                            Publication Document
                        </h2>

                        <p>
                            View the current PDF or upload a replacement.
                        </p>

                    </div>


                    <div class="form-body">


                        {{-- CURRENT PDF --}}

                        @if($publication->pdf_file)

                            <div class="current-file">

                                <div class="file-info">

                                    <div class="file-icon">
                                        📄
                                    </div>

                                    <div>

                                        <div class="file-name">
                                            Current publication PDF
                                        </div>

                                        <div class="file-label">
                                            A PDF is currently attached to this publication.
                                        </div>

                                    </div>

                                </div>


                                <a
                                    href="{{ asset('storage/' . $publication->pdf_file) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="view-file-btn"
                                >
                                    View PDF ↗
                                </a>

                            </div>

                        @endif


                        {{-- NEW PDF --}}

                        <div class="upload-box">

                            <div class="upload-icon">
                                📤
                            </div>

                            <strong>
                                {{ $publication->pdf_file
                                    ? 'Replace Publication PDF'
                                    : 'Upload Publication PDF'
                                }}
                            </strong>

                            <div class="form-help">
                                Select a new PDF only if you want to replace the current document.
                            </div>

                            <input
                                type="file"
                                name="pdf_file"
                                accept=".pdf,application/pdf"
                            >

                            @error('pdf_file')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- FORM ACTIONS --}}

                <div class="form-actions">

                    <a
                        href="{{ route('publications.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        ✓ Update Publication
                    </button>

                </div>


            </div>


            {{-- ==========================================
                 SIDEBAR
            =========================================== --}}

            <aside>


                {{-- RECORD INFORMATION --}}

                <div class="side-card">

                    <div class="side-title">
                        Record Information
                    </div>

                    <div class="side-body">

                        <div class="record-info">

                            <span class="record-label">
                                Publication ID
                            </span>

                            <div class="record-value">
                                #{{ $publication->id }}
                            </div>

                        </div>


                        <div class="record-info">

                            <span class="record-label">
                                Current Status
                            </span>

                            <div class="record-value">
                                {{ $publication->status }}
                            </div>

                        </div>


                        <div class="record-info">

                            <span class="record-label">
                                Created
                            </span>

                            <div class="record-value">
                                {{ $publication->created_at?->format('d M Y') ?? '—' }}
                            </div>

                        </div>


                        <div class="record-info">

                            <span class="record-label">
                                Last Updated
                            </span>

                            <div class="record-value">
                                {{ $publication->updated_at?->format('d M Y') ?? '—' }}
                            </div>

                        </div>

                    </div>

                </div>


                {{-- UPDATE GUIDELINES --}}

                <div class="side-card">

                    <div class="side-title">
                        Update Guidelines
                    </div>

                    <div class="side-body">

                        <p>
                            Review the information carefully before updating
                            the publication record.
                        </p>

                        <ul class="side-list">

                            <li>
                                Keep the publication title complete and accurate.
                            </li>

                            <li>
                                Maintain the correct author order.
                            </li>

                            <li>
                                Verify DOI information.
                            </li>

                            <li>
                                Use the official publisher URL.
                            </li>

                            <li>
                                Replace the PDF only when necessary.
                            </li>

                            <li>
                                Use Draft to temporarily hide the publication
                                from the public website.
                            </li>

                        </ul>

                    </div>

                </div>


                {{-- PDF INFORMATION --}}

                <div class="side-card">

                    <div class="side-title">
                        PDF Management
                    </div>

                    <div class="side-body">

                        @if($publication->pdf_file)

                            <p>
                                This publication currently has a PDF attached.
                                Uploading a new PDF will replace the existing file.
                            </p>

                        @else

                            <p>
                                No PDF is currently attached to this publication.
                                You can upload one using the document section.
                            </p>

                        @endif

                    </div>

                </div>


            </aside>


        </div>

    </form>

</div>

@endsection