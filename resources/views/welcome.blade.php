<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        AG-Lab SUST | Laboratory of Genomics and Transcriptomics
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f8fafc;
            color: #1f2937;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(255,255,255,.96);

            backdrop-filter: blur(10px);

            border-bottom: 1px solid #e5e7eb;

            padding: 15px 6%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            color: #14532d;
        }

        .brand-icon {
            width: 43px;
            height: 43px;

            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #166534,
                #22c55e
            );

            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
            font-weight: bold;
        }

        .brand-text strong {
            display: block;
            font-size: 18px;
            line-height: 1.2;
        }

        .brand-text span {
            display: block;
            margin-top: 2px;

            color: #6b7280;

            font-size: 10px;
            font-weight: 600;

            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;

            list-style: none;
        }

        .nav-links a {
            color: #374151;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .nav-links a:hover {
            color: #15803d;
        }

        .nav-output {
            color: #166534 !important;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;

            min-height: 570px;

            display: flex;
            align-items: center;

            background:
                linear-gradient(
                    120deg,
                    #052e16 0%,
                    #14532d 45%,
                    #166534 100%
                );

            color: #fff;
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 520px;
            height: 520px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.10);

            right: -170px;
            top: -160px;
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.08);

            right: 70px;
            bottom: -250px;
        }

        .hero-container {
            width: 88%;
            max-width: 1200px;

            margin: auto;

            display: grid;
            grid-template-columns: 1.15fr .85fr;

            gap: 60px;

            align-items: center;

            position: relative;
            z-index: 2;
        }

        .hero-content {
            max-width: 700px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 7px 13px;

            border: 1px solid rgba(255,255,255,.20);

            border-radius: 50px;

            background: rgba(255,255,255,.08);

            font-size: 11px;
            font-weight: 700;

            letter-spacing: .6px;
            text-transform: uppercase;

            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(38px, 5vw, 62px);

            line-height: 1.08;

            letter-spacing: -1.5px;

            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #86efac;
        }

        .hero-description {
            max-width: 650px;

            color: #dcfce7;

            font-size: 16px;

            line-height: 1.8;

            margin-bottom: 30px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 46px;

            padding: 0 19px;

            border-radius: 7px;

            font-size: 13px;
            font-weight: 700;

            transition: .2s ease;
        }

        .hero-btn-primary {
            background: #fff;
            color: #14532d;
        }

        .hero-btn-primary:hover {
            background: #dcfce7;
            transform: translateY(-2px);
        }

        .hero-btn-secondary {
            color: #fff;

            border: 1px solid rgba(255,255,255,.30);

            background: rgba(255,255,255,.07);
        }

        .hero-btn-secondary:hover {
            background: rgba(255,255,255,.14);
        }

        /* =========================
           HERO VISUAL
        ========================= */

        .hero-visual {
            display: flex;
            justify-content: center;
        }

        .lab-card {
            width: 330px;
            min-height: 340px;

            padding: 28px;

            border-radius: 18px;

            background: rgba(255,255,255,.08);

            border: 1px solid rgba(255,255,255,.15);

            backdrop-filter: blur(10px);

            box-shadow:
                0 25px 60px rgba(0,0,0,.18);
        }

        .dna-symbol {
            width: 76px;
            height: 76px;

            border-radius: 18px;

            margin-bottom: 22px;

            background: rgba(255,255,255,.12);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 37px;
        }

        .lab-card h3 {
            font-size: 22px;
            margin-bottom: 8px;
        }

        .lab-card > p {
            color: #d1fae5;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 24px;
        }

        .lab-points {
            display: grid;
            gap: 10px;
        }

        .lab-point {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #ecfdf5;

            font-size: 12px;
        }

        .lab-point span {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #86efac;
        }

        /* =========================
           STATS
        ========================= */

        .stats-section {
            position: relative;
            z-index: 5;

            margin-top: -45px;
        }

        .stats-container {
            width: 88%;
            max-width: 1100px;

            margin: auto;

            display: grid;
            grid-template-columns:
                repeat(4, 1fr);

            background: #fff;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            box-shadow:
                0 15px 40px rgba(15,23,42,.08);

            overflow: hidden;
        }

        .stat-item {
            padding: 24px 20px;

            text-align: center;

            border-right: 1px solid #e5e7eb;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-number {
            display: block;

            color: #166534;

            font-size: 28px;

            font-weight: 800;

            margin-bottom: 4px;
        }

        .stat-label {
            color: #6b7280;

            font-size: 11px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .4px;
        }

        /* =========================
           GENERAL SECTION
        ========================= */

        .section {
            padding: 90px 6%;
        }

        .section-container {
            max-width: 1150px;
            margin: auto;
        }

        .section-heading {
            max-width: 680px;

            margin-bottom: 40px;
        }

        .section-label {
            display: block;

            color: #15803d;

            font-size: 11px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1.2px;

            margin-bottom: 9px;
        }

        .section-heading h2 {
            color: #111827;

            font-size: 34px;

            line-height: 1.2;

            letter-spacing: -.7px;

            margin-bottom: 12px;
        }

        .section-heading p {
            color: #6b7280;

            font-size: 14px;

            line-height: 1.8;
        }

        /* =========================
           ABOUT
        ========================= */

        .about-section {
            background: #fff;
        }

        .about-grid {
            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 60px;

            align-items: center;
        }

        .about-text p {
            color: #6b7280;

            font-size: 14px;

            line-height: 1.9;

            margin-bottom: 18px;
        }

        .about-highlight {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 13px;

            margin-top: 25px;
        }

        .highlight-item {
            padding: 16px;

            border-radius: 9px;

            background: #f0fdf4;

            border: 1px solid #dcfce7;
        }

        .highlight-item strong {
            display: block;

            color: #166534;

            font-size: 13px;

            margin-bottom: 4px;
        }

        .highlight-item span {
            color: #6b7280;

            font-size: 11px;
        }

        .about-panel {
            padding: 30px;

            border-radius: 14px;

            background:
                linear-gradient(
                    145deg,
                    #f0fdf4,
                    #ecfdf5
                );

            border: 1px solid #bbf7d0;
        }

        .about-panel h3 {
            color: #14532d;

            font-size: 21px;

            margin-bottom: 12px;
        }

        .about-panel p {
            color: #4b5563;

            font-size: 13px;

            line-height: 1.8;

            margin-bottom: 20px;
        }

        .department {
            padding-top: 18px;

            border-top: 1px solid #bbf7d0;

            color: #166534;

            font-size: 12px;

            font-weight: 700;
        }

        /* =========================
           RESEARCH
        ========================= */

        .research-section {
            background: #f8fafc;
        }

        .research-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;
        }

        .research-card {
            padding: 25px;

            background: #fff;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            transition: .25s ease;
        }

        .research-card:hover {
            transform: translateY(-5px);

            border-color: #bbf7d0;

            box-shadow:
                0 15px 30px rgba(15,23,42,.06);
        }

        .research-icon {
            width: 45px;
            height: 45px;

            border-radius: 10px;

            background: #dcfce7;

            color: #166534;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;

            margin-bottom: 17px;
        }

        .research-card h3 {
            color: #111827;

            font-size: 16px;

            margin-bottom: 8px;
        }

        .research-card p {
            color: #6b7280;

            font-size: 12px;

            line-height: 1.7;
        }

        /* =========================
           OUTPUTS CTA
        ========================= */

        .outputs-section {
            background: #fff;
        }

        .outputs-box {
            padding: 55px;

            border-radius: 17px;

            background:
                linear-gradient(
                    120deg,
                    #052e16,
                    #166534
                );

            color: #fff;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 35px;
        }

        .outputs-box h2 {
            font-size: 30px;

            line-height: 1.25;

            margin-bottom: 10px;
        }

        .outputs-box p {
            max-width: 650px;

            color: #dcfce7;

            font-size: 13px;

            line-height: 1.7;
        }

        .outputs-button {
            flex-shrink: 0;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 46px;

            padding: 0 20px;

            border-radius: 7px;

            background: #fff;

            color: #166534;

            font-size: 13px;

            font-weight: 800;
        }

        .outputs-button:hover {
            background: #dcfce7;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111827;

            color: #fff;

            padding: 45px 6% 25px;
        }

        .footer-container {
            max-width: 1150px;

            margin: auto;

            display: grid;

            grid-template-columns:
                1.4fr 1fr 1fr;

            gap: 45px;

            padding-bottom: 30px;

            border-bottom: 1px solid #374151;
        }

        .footer-brand h3 {
            font-size: 17px;

            margin-bottom: 9px;
        }

        .footer-brand p {
            max-width: 440px;

            color: #9ca3af;

            font-size: 12px;

            line-height: 1.8;
        }

        .footer-column h4 {
            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: .6px;

            margin-bottom: 13px;
        }

        .footer-column a {
            display: block;

            color: #9ca3af;

            font-size: 12px;

            margin-bottom: 8px;

            transition: .2s ease;
        }

        .footer-column a:hover {
            color: #86efac;
        }

        .footer-bottom {
            max-width: 1150px;

            margin: 20px auto 0;

            color: #6b7280;

            font-size: 11px;

            display: flex;

            justify-content: space-between;

            gap: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 950px) {

            .navbar {
                padding: 14px 4%;
            }

            .nav-links {
                gap: 15px;
            }

            .hero-container {
                grid-template-columns: 1fr;
                padding: 80px 0;
            }

            .hero-visual {
                justify-content: flex-start;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .research-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .outputs-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-container {
                grid-template-columns:
                    1fr 1fr;
            }

        }

        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                width: 100%;

                flex-wrap: wrap;

                gap: 12px 18px;
            }

            .hero {
                min-height: auto;
            }

            .hero-container {
                width: 90%;
                padding: 70px 0;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero-description {
                font-size: 14px;
            }

            .lab-card {
                width: 100%;
            }

            .stats-container {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .stat-item:nth-child(2) {
                border-right: none;
            }

            .stat-item:nth-child(-n+2) {
                border-bottom: 1px solid #e5e7eb;
            }

            .section {
                padding: 65px 5%;
            }

            .section-heading h2 {
                font-size: 29px;
            }

            .about-highlight {
                grid-template-columns: 1fr;
            }

            .research-grid {
                grid-template-columns: 1fr;
            }

            .outputs-box {
                padding: 35px 25px;
            }

            .outputs-box h2 {
                font-size: 26px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-bottom {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>


    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <a href="/" class="brand">

            <div class="brand-icon">
                AG
            </div>

            <div class="brand-text">

                <strong>
                    AG-Lab SUST
                </strong>

                <span>
                    Genomics & Transcriptomics
                </span>

            </div>

        </a>


        <ul class="nav-links">

            <li>
                <a href="/">
                    Home
                </a>
            </li>

            <li>
                <a href="#research">
                    Research Focus
                </a>
            </li>

            <li>
                <a
                    href="{{ route('public.outputs') }}"
                    class="nav-output"
                >
                    Outputs
                </a>
            </li>

            <li>
                <a href="#about">
                    About
                </a>
            </li>

            <li>
                <a href="#contact">
                    Contact
                </a>
            </li>

        </ul>

    </nav>


    {{-- =========================
         HERO
    ========================== --}}

    <section class="hero">

        <div class="hero-container">


            <div class="hero-content">

                <div class="hero-tag">
                    🧬 Research Laboratory · SUST
                </div>


                <h1>

                    Advancing

                    <span>
                        Genomics
                    </span>

                    &

                    <span>
                        Transcriptomics
                    </span>

                </h1>


                <p class="hero-description">

                    The Laboratory of Genomics and Transcriptomics
                    explores biological systems through genomic and
                    transcriptomic approaches, supporting research,
                    discovery and scientific knowledge development.

                </p>


                <div class="hero-actions">

                    <a
                        href="{{ route('public.outputs') }}"
                        class="hero-btn hero-btn-primary"
                    >
                        Explore Publications →
                    </a>


                    <a
                        href="#research"
                        class="hero-btn hero-btn-secondary"
                    >
                        Research Focus
                    </a>

                </div>

            </div>


            <div class="hero-visual">

                <div class="lab-card">

                    <div class="dna-symbol">
                        🧬
                    </div>

                    <h3>
                        Laboratory of Genomics
                        & Transcriptomics
                    </h3>

                    <p>
                        Department of Biochemistry and
                        Molecular Biology, Shahjalal University
                        of Science and Technology.
                    </p>


                    <div class="lab-points">

                        <div class="lab-point">
                            <span></span>
                            Genomic research
                        </div>

                        <div class="lab-point">
                            <span></span>
                            Transcriptomic analysis
                        </div>

                        <div class="lab-point">
                            <span></span>
                            Molecular biology
                        </div>

                        <div class="lab-point">
                            <span></span>
                            Scientific publications
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </section>


    {{-- =========================
         STATS
    ========================== --}}

    <section class="stats-section">

        <div class="stats-container">

            <div class="stat-item">

                <span class="stat-number">
                    Research
                </span>

                <span class="stat-label">
                    Scientific Focus
                </span>

            </div>


            <div class="stat-item">

                <span class="stat-number">
                    Genomics
                </span>

                <span class="stat-label">
                    Core Area
                </span>

            </div>


            <div class="stat-item">

                <span class="stat-number">
                    RNA
                </span>

                <span class="stat-label">
                    Transcriptomics
                </span>

            </div>


            <div class="stat-item">

                <span class="stat-number">
                    SUST
                </span>

                <span class="stat-label">
                    Academic Institution
                </span>

            </div>

        </div>

    </section>


    {{-- =========================
         ABOUT
    ========================== --}}

    <section
        class="section about-section"
        id="about"
    >

        <div class="section-container">

            <div class="about-grid">


                <div class="about-text">

                    <div class="section-heading">

                        <span class="section-label">
                            About the Laboratory
                        </span>

                        <h2>
                            Research driven by
                            biological data
                        </h2>

                        <p>
                            AG-Lab focuses on research involving
                            genomics, transcriptomics and molecular
                            biology, with an emphasis on generating
                            and communicating meaningful scientific
                            findings.
                        </p>

                    </div>


                    <p>
                        The laboratory is part of the Department of
                        Biochemistry and Molecular Biology at
                        Shahjalal University of Science and Technology.
                    </p>


                    <div class="about-highlight">

                        <div class="highlight-item">

                            <strong>
                                Genomics
                            </strong>

                            <span>
                                Genome-level research and analysis
                            </span>

                        </div>


                        <div class="highlight-item">

                            <strong>
                                Transcriptomics
                            </strong>

                            <span>
                                Gene expression and RNA-focused studies
                            </span>

                        </div>


                        <div class="highlight-item">

                            <strong>
                                Molecular Biology
                            </strong>

                            <span>
                                Biological mechanisms and research
                            </span>

                        </div>


                        <div class="highlight-item">

                            <strong>
                                Publications
                            </strong>

                            <span>
                                Research outputs and scholarly work
                            </span>

                        </div>

                    </div>

                </div>


                <div class="about-panel">

                    <h3>
                        Laboratory of Genomics
                        & Transcriptomics
                    </h3>

                    <p>
                        Our research environment brings together
                        biological investigation, computational
                        approaches and scientific communication
                        to support modern molecular research.
                    </p>

                    <div class="department">

                        Department of Biochemistry and
                        Molecular Biology · SUST

                    </div>

                </div>


            </div>

        </div>

    </section>


    {{-- =========================
         RESEARCH FOCUS
    ========================== --}}

    <section
        class="section research-section"
        id="research"
    >

        <div class="section-container">


            <div class="section-heading">

                <span class="section-label">
                    Research Focus
                </span>

                <h2>
                    Areas of scientific investigation
                </h2>

                <p>
                    Explore the major research-oriented areas
                    represented by the laboratory.
                </p>

            </div>


            <div class="research-grid">


                <div class="research-card">

                    <div class="research-icon">
                        🧬
                    </div>

                    <h3>
                        Genomics
                    </h3>

                    <p>
                        Research focused on genomic information,
                        genome-level investigation and biological
                        interpretation.
                    </p>

                </div>


                <div class="research-card">

                    <div class="research-icon">
                        🧪
                    </div>

                    <h3>
                        Molecular Biology
                    </h3>

                    <p>
                        Investigation of molecular processes and
                        biological mechanisms using experimental
                        and analytical approaches.
                    </p>

                </div>


                <div class="research-card">

                    <div class="research-icon">
                        RNA
                    </div>

                    <h3>
                        Transcriptomics
                    </h3>

                    <p>
                        Study of RNA and gene-expression patterns
                        to understand biological systems.
                    </p>

                </div>


                <div class="research-card">

                    <div class="research-icon">
                        📊
                    </div>

                    <h3>
                        Data Analysis
                    </h3>

                    <p>
                        Analysis and interpretation of biological
                        datasets to support research findings.
                    </p>

                </div>


                <div class="research-card">

                    <div class="research-icon">
                        🔬
                    </div>

                    <h3>
                        Biological Research
                    </h3>

                    <p>
                        Scientific investigation connecting
                        biological questions with modern research
                        methodologies.
                    </p>

                </div>


                <div class="research-card">

                    <div class="research-icon">
                        📚
                    </div>

                    <h3>
                        Scientific Communication
                    </h3>

                    <p>
                        Documentation and dissemination of research
                        findings through scholarly publications.
                    </p>

                </div>


            </div>

        </div>

    </section>


    {{-- =========================
         OUTPUTS
    ========================== --}}

    <section
        class="section outputs-section"
    >

        <div class="section-container">

            <div class="outputs-box">

                <div>

                    <span class="section-label">
                        Research Outputs
                    </span>

                    <h2>
                        Explore our publications
                    </h2>

                    <p>
                        Browse published research from the
                        Laboratory of Genomics and Transcriptomics,
                        organized by publication year with detailed
                        information, DOI references and available
                        documents.
                    </p>

                </div>


                <a
                    href="{{ route('public.outputs') }}"
                    class="outputs-button"
                >
                    View Publications →
                </a>

            </div>

        </div>

    </section>


    {{-- =========================
         FOOTER
    ========================== --}}

    <footer
        class="footer"
        id="contact"
    >

        <div class="footer-container">


            <div class="footer-brand">

                <h3>
                    AG-Lab SUST
                </h3>

                <p>
                    Laboratory of Genomics and Transcriptomics,
                    Department of Biochemistry and Molecular Biology,
                    Shahjalal University of Science and Technology.
                </p>

            </div>


            <div class="footer-column">

                <h4>
                    Navigation
                </h4>

                <a href="/">
                    Home
                </a>

                <a href="#research">
                    Research Focus
                </a>

                <a href="{{ route('public.outputs') }}">
                    Outputs
                </a>

                <a href="#about">
                    About
                </a>

            </div>


            <div class="footer-column">

                <h4>
                    Academic
                </h4>

                <a href="#about">
                    Laboratory
                </a>

                <a href="{{ route('public.outputs') }}">
                    Publications
                </a>

                <a href="#research">
                    Research Areas
                </a>

            </div>


        </div>


        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} AG-Lab SUST.
                All rights reserved.
            </span>

            <span>
                Department of Biochemistry and Molecular Biology
            </span>

        </div>

    </footer>


</body>

</html>