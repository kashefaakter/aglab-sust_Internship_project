<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'AG-Lab SUST')
    </title>

    <meta
        name="description"
        content="AG-Lab SUST - Laboratory of Genomics and Transcriptomics"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

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
            font-family: 'Inter', sans-serif;
            background: #f7faf8;
            color: #25352d;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* =========================================
           TOP UNIVERSITY BAR
        ========================================= */

        .top-bar {
            background: #0b2b1b;
            color: #ffffff;
            padding: 11px 20px;
            text-align: center;
            font-size: 15px;
            font-weight: 500;
        }

        /* =========================================
           NAVBAR
        ========================================= */

        .main-navbar {
            position: sticky;
            top: 0;
            z-index: 999;

            background: #ffffff;

            border-bottom: 1px solid #e5ebe7;

            box-shadow:
                0 2px 12px rgba(0, 0, 0, 0.04);
        }

        .nav-container {
            max-width: 1240px;
            margin: 0 auto;

            min-height: 88px;

            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        /* =========================================
           BRAND
        ========================================= */

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            flex-shrink: 0;
        }

        .brand-mark {
            width: 46px;
            height: 46px;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #0b633b,
                    #15905a
                );

            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
            font-weight: 800;

            box-shadow:
                0 5px 14px rgba(11, 99, 59, 0.18);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 800;
            color: #103d28;
        }

        .brand-subtitle {
            margin-top: 4px;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: 0.7px;
            text-transform: uppercase;

            color: #74837b;
        }

        /* =========================================
           NAV LINKS
        ========================================= */

        .nav-menu {
            display: flex;
            align-items: center;

            gap: 4px;

            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;

            padding: 12px 14px;

            border-radius: 7px;

            color: #3d5046;

            font-size: 15px;
            font-weight: 600;

            transition:
                color 0.2s ease,
                background 0.2s ease;
        }

        .nav-link:hover {
            color: #087443;
            background: #f0f7f3;
        }

        .nav-link.active {
            color: #087443;
            background: #eef7f2;
        }

        /* =========================================
           OUTPUTS DROPDOWN
        ========================================= */

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown > .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .dropdown-arrow {
            font-size: 12px;

            transition:
                transform 0.2s ease;
        }

        .nav-dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;

            top: calc(100% + 8px);
            left: 0;

            min-width: 230px;

            padding: 8px;

            background: #ffffff;

            border: 1px solid #e7ece9;

            border-radius: 9px;

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.12);

            opacity: 0;
            visibility: hidden;

            transform: translateY(8px);

            transition:
                opacity 0.2s ease,
                visibility 0.2s ease,
                transform 0.2s ease;

            z-index: 1000;
        }

        .nav-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;

            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;

            padding: 13px 16px;

            border-radius: 7px;

            color: #2f4037;

            font-size: 15px;
            font-weight: 600;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .dropdown-menu a:hover {
            background: #eef7f2;
            color: #087443;
        }

        .dropdown-menu a::before {
            content: "→";

            margin-right: 9px;

            color: #0b7545;

            opacity: 0;

            transition: opacity 0.2s ease;
        }

        .dropdown-menu a:hover::before {
            opacity: 1;
        }

        /* =========================================
           MOBILE MENU BUTTON
        ========================================= */

        .mobile-menu-btn {
            display: none;

            width: 42px;
            height: 42px;

            border: 1px solid #dce5df;
            border-radius: 8px;

            background: #ffffff;

            cursor: pointer;

            color: #164a31;

            font-size: 22px;
        }

        /* =========================================
           PAGE CONTENT
        ========================================= */

        .page-content {
            min-height: 60vh;
        }

        /* =========================================
           FOOTER
        ========================================= */

        .site-footer {
            margin-top: 70px;

            background: #0a291a;

            color: #d9e6df;
        }

        .footer-container {
            max-width: 1240px;
            margin: 0 auto;

            padding: 55px 24px 30px;

            display: grid;

            grid-template-columns:
                1.6fr
                1fr
                1fr;

            gap: 55px;
        }

        .footer-brand {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 18px;
        }

        .footer-brand-mark {
            width: 44px;
            height: 44px;

            border-radius: 9px;

            background: #168153;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #ffffff;

            font-size: 16px;
            font-weight: 800;
        }

        .footer-brand-title {
            color: #ffffff;

            font-size: 18px;
            font-weight: 800;
        }

        .footer-description {
            max-width: 470px;

            color: #aec0b6;

            font-size: 14px;

            line-height: 1.8;
        }

        .footer-column h3 {
            margin-bottom: 18px;

            color: #ffffff;

            font-size: 15px;
            font-weight: 700;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #aec0b6;

            font-size: 14px;

            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .footer-contact {
            list-style: none;
        }

        .footer-contact li {
            margin-bottom: 11px;

            color: #aec0b6;

            font-size: 14px;
        }

        .footer-bottom {
            max-width: 1240px;
            margin: 0 auto;

            padding: 18px 24px;

            border-top: 1px solid rgba(255, 255, 255, 0.10);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .footer-bottom p {
            color: #8fa69a;

            font-size: 13px;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {

            .nav-container {
                gap: 15px;
            }

            .nav-link {
                padding: 10px 9px;
                font-size: 14px;
            }

            .brand-title {
                font-size: 16px;
            }

            .brand-subtitle {
                font-size: 9px;
            }
        }

        @media (max-width: 900px) {

            .mobile-menu-btn {
                display: flex;

                align-items: center;
                justify-content: center;
            }

            .nav-menu {
                display: none;

                position: absolute;

                top: 100%;
                left: 0;
                right: 0;

                background: #ffffff;

                padding: 12px 20px 18px;

                border-bottom: 1px solid #e4ebe7;

                box-shadow:
                    0 10px 25px rgba(0, 0, 0, 0.08);

                flex-direction: column;

                align-items: stretch;

                gap: 3px;
            }

            .nav-menu.show {
                display: flex;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                width: 100%;

                padding: 13px 14px;
            }

            /* Mobile dropdown */

            .nav-dropdown > .nav-link {
                justify-content: space-between;
            }

            .dropdown-menu {
                position: static;

                width: 100%;

                min-width: 0;

                margin-top: 3px;

                padding: 4px 8px;

                border: none;

                border-radius: 7px;

                box-shadow: none;

                background: #f5f9f7;

                opacity: 1;
                visibility: visible;

                transform: none;

                display: none;
            }

            .nav-dropdown:hover .dropdown-menu {
                display: block;
            }

            .dropdown-menu a {
                padding: 11px 14px;

                font-size: 14px;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
            }

            .footer-container > :first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {

            .top-bar {
                padding: 9px 15px;

                font-size: 13px;
            }

            .nav-container {
                min-height: 72px;

                padding: 0 16px;
            }

            .brand-mark {
                width: 40px;
                height: 40px;

                font-size: 15px;
            }

            .brand-title {
                font-size: 15px;
            }

            .brand-subtitle {
                font-size: 8px;

                letter-spacing: 0.4px;
            }

            .footer-container {
                grid-template-columns: 1fr;

                gap: 35px;

                padding: 45px 20px 25px;
            }

            .footer-container > :first-child {
                grid-column: auto;
            }

            .footer-bottom {
                padding: 18px 20px;

                flex-direction: column;

                align-items: flex-start;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <!-- =========================================
         TOP UNIVERSITY BAR
    ========================================== -->

    <div class="top-bar">
        Shahjalal University of Science and Technology
    </div>


    <!-- =========================================
         NAVBAR
    ========================================== -->

    <header class="main-navbar">

        <div class="nav-container">

            <!-- Brand -->

            <a href="{{ url('/') }}" class="brand">

                <div class="brand-mark">
                    AG
                </div>

                <div class="brand-text">

                    <span class="brand-title">
                        AG-Lab SUST
                    </span>

                    <span class="brand-subtitle">
                        Genomics &amp; Transcriptomics
                    </span>

                </div>

            </a>


            <!-- Mobile Button -->

            <button
                type="button"
                class="mobile-menu-btn"
                id="mobileMenuBtn"
                aria-label="Toggle navigation"
            >
                ☰
            </button>


            <!-- Navigation -->

            <ul class="nav-menu" id="navMenu">

                <!-- Home -->

                <li class="nav-item">

                    <a
                        href="{{ url('/') }}"
                        class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                    >
                        Home
                    </a>

                </li>


                <!-- Research Focus -->

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link"
                    >
                        Research Focus
                    </a>

                </li>


                <!-- Outputs Dropdown -->

                <li class="nav-item nav-dropdown">

                    <a
                        href="{{ route('public.outputs') }}"
                        class="nav-link {{ request()->is('outputs*') ? 'active' : '' }}"
                    >

                        <span>
                            Outputs
                        </span>

                        <span class="dropdown-arrow">
                            ▾
                        </span>

                    </a>


                    <!-- Dropdown -->

                    <div class="dropdown-menu">

                        <a
                            href="{{ route('public.outputs') }}"
                        >
                            Publications
                        </a>

                    </div>

                </li>


                <!-- Members & Alumni -->

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link"
                    >
                        Members &amp; Alumni
                    </a>

                </li>


                <!-- News & Blogs -->

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link"
                    >
                        News &amp; Blogs
                    </a>

                </li>


                <!-- Contact -->

                <li class="nav-item">

                    <a
                        href="#"
                        class="nav-link"
                    >
                        Contact
                    </a>

                </li>

            </ul>

        </div>

    </header>


    <!-- =========================================
         PAGE CONTENT
    ========================================== -->

    <main class="page-content">

        @yield('content')

    </main>


    <!-- =========================================
         FOOTER
    ========================================== -->

    <footer class="site-footer">

        <div class="footer-container">

            <!-- About -->

            <div>

                <div class="footer-brand">

                    <div class="footer-brand-mark">
                        AG
                    </div>

                    <div class="footer-brand-title">
                        AG-Lab SUST
                    </div>

                </div>

                <p class="footer-description">
                    Laboratory of Genomics and Transcriptomics,
                    Department of Biochemistry and Molecular Biology,
                    Shahjalal University of Science and Technology.
                </p>

            </div>


            <!-- Quick Links -->

            <div class="footer-column">

                <h3>
                    Quick Links
                </h3>

                <ul class="footer-links">

                    <li>
                        <a href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('public.outputs') }}">
                            Publications
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Research Focus
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Members &amp; Alumni
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Contact -->

            <div class="footer-column">

                <h3>
                    Contact
                </h3>

                <ul class="footer-contact">

                    <li>
                        Department of Biochemistry and Molecular Biology
                    </li>

                    <li>
                        Shahjalal University of Science and Technology
                    </li>

                    <li>
                        Sylhet, Bangladesh
                    </li>

                </ul>

            </div>

        </div>


        <!-- Footer Bottom -->

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} AG-Lab SUST. All rights reserved.
            </p>

            <p>
                Laboratory of Genomics &amp; Transcriptomics
            </p>

        </div>

    </footer>


    <!-- =========================================
         JAVASCRIPT
    ========================================== -->

    <script>

        const mobileMenuBtn =
            document.getElementById('mobileMenuBtn');

        const navMenu =
            document.getElementById('navMenu');


        if (mobileMenuBtn && navMenu) {

            mobileMenuBtn.addEventListener(
                'click',
                function () {

                    navMenu.classList.toggle('show');

                    if (navMenu.classList.contains('show')) {

                        mobileMenuBtn.innerHTML = '✕';

                    } else {

                        mobileMenuBtn.innerHTML = '☰';

                    }

                }
            );


            /* Close menu after clicking a normal link */

            navMenu.querySelectorAll(
                '.nav-link, .dropdown-menu a'
            ).forEach(function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (
                            window.innerWidth <= 900
                        ) {

                            navMenu.classList.remove('show');

                            mobileMenuBtn.innerHTML = '☰';

                        }

                    }
                );

            });

        }

    </script>


    @yield('scripts')

</body>
</html>