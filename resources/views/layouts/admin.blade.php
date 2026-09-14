<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'AG-Lab Admin')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #064e3b, #022c22);
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 10px 28px;
            border-bottom: 1px solid rgba(255,255,255,0.12);
            margin-bottom: 22px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(255,255,255,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand-text h2 {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .brand-text span {
            color: #a7f3d0;
            font-size: 11px;
        }

        .menu-title {
            color: #86efac;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #d1fae5;
            text-decoration: none;
            padding: 13px 14px;
            border-radius: 9px;
            margin-bottom: 6px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,0.10);
            color: #fff;
            transform: translateX(2px);
        }

        .sidebar-link.active {
            background: #10b981;
            color: #fff;
            box-shadow: 0 6px 18px rgba(16,185,129,0.25);
        }

        .link-icon {
            width: 22px;
            text-align: center;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .website-link {
            border: 1px solid rgba(255,255,255,0.12);
            margin-bottom: 10px;
        }

        .logout-btn {
            width: 100%;
            border: 0;
            cursor: pointer;
            background: rgba(239,68,68,0.10);
            color: #fecaca;
            text-align: left;
            padding: 13px 14px;
            border-radius: 9px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: #fff;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .page-heading h1 {
            font-size: 21px;
            color: #111827;
            font-weight: 700;
        }

        .page-heading p {
            margin-top: 3px;
            font-size: 12px;
            color: #6b7280;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #d1fae5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
            color: #111827;
        }

        .profile-info span {
            font-size: 11px;
            color: #6b7280;
        }

        .content {
            padding: 32px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .content {
                padding: 22px;
            }

            .topbar {
                padding: 0 22px;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .brand {
                margin-bottom: 15px;
            }

            .sidebar-bottom {
                margin-top: 20px;
            }

            .topbar {
                height: auto;
                padding: 18px;
                gap: 15px;
                align-items: flex-start;
            }

            .content {
                padding: 18px;
            }

            .profile-info {
                display: none;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                🧬
            </div>

            <div class="brand-text">
                <h2>AG-Lab Admin</h2>
                <span>SUST Research Laboratory</span>
            </div>

        </div>

        <div class="menu-title">
            Main Menu
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">

            <span class="link-icon">📊</span>
            <span>Dashboard</span>

        </a>

        <a href="{{ route('publications.index') }}"
           class="sidebar-link {{ request()->is('admin/publications*') ? 'active' : '' }}">

            <span class="link-icon">📚</span>
            <span>Publications</span>

        </a>

        <div class="sidebar-bottom">

            <a href="{{ route('public.outputs') }}"
               target="_blank"
               class="sidebar-link website-link">

                <span class="link-icon">🌐</span>
                <span>View Website</span>

            </a>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit" class="logout-btn">

                    <span class="link-icon">↪</span>
                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================= MAIN AREA ================= -->

    <div class="main">

        <header class="topbar">

            <div class="page-heading">

                <h1>
                    @yield('page-title', 'Admin Panel')
                </h1>

                <p>
                    AG-Lab SUST Management System
                </p>

            </div>


            <div class="admin-profile">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="profile-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        {{ auth()->user()->email }}
                    </span>

                </div>

            </div>

        </header>


        <main class="content">

            @yield('content')

        </main>

    </div>

</body>
</html>