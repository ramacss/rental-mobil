<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RentalMobil') - RentalMobil</title>
    <link rel="stylesheet" href="{{ asset('css/style_bengkel_maintenance.css') }}">
</head>
<body>
    <header class="dashboard-header">
        <div class="header-left">
            <h2>RentalMobil</h2>
            <span>Sistem Administrasi Rental Mobil</span>
        </div>

        <div class="header-right">
            <div class="user-info">
                <div class="user-avatar">A</div>
                <div class="user-detail">
                    <strong>Administrator</strong>
                    <small>Pengelola Sistem</small>
                </div>
            </div>
        </div>
    </header>

    <aside class="dashboard-sidebar">
        <div class="sidebar-title">
            <h3>MENU UTAMA</h3>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('bengkel.index') }}"
               class="sidebar-link {{ request()->routeIs('bengkel.index') ? 'active' : '' }}">
                <span>🏠</span> Dashboard Bengkel
            </a>
            <a href="{{ route('bengkel.index') }}"
               class="sidebar-link {{ request()->routeIs('bengkel.create') ? 'active' : '' }}">
                <span>🔧</span> Data Bengkel
            </a>
            <a href="{{ route('bengkel.create') }}"
               class="sidebar-link {{ request()->routeIs('bengkel.create') ? 'active' : '' }}">
                <span>➕</span> Tambah Bengkel
            </a>
        </nav>

        <div class="sidebar-bottom">
            <p><strong>RentalMobil</strong></p>
            <small>Manajemen Bengkel Maintenance</small>
        </div>
    </aside>

    <main class="dashboard-content">
        @yield('content')
    </main>

    <footer class="dashboard-footer">
        <p>© {{ date('Y') }} RentalMobil</p>
        <p>Sistem Manajemen Bengkel Maintenance</p>
    </footer>
</body>
</html>
