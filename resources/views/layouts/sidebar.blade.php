<aside class="dashboard-sidebar">
    <div class="sidebar-title">
        <h3>MENU UTAMA</h3>
    </div>

    <nav class="sidebar-nav">

        <a href="{{ url('/dashboard') }}" class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <span>⌂</span>
            Dashboard
        </a>

        <a href="{{ route('armada.index') }}" class="sidebar-link {{ request()->is('armada*') ? 'active' : '' }}">
            <span>🚗</span>
            Armada Kendaraan
        </a>

        <a href="{{ url('/paket') }}" class="sidebar-link {{ request()->is('paket*') ? 'active' : '' }}">
            <span>📦</span>
            Paket Rental
        </a>

        <a href="{{ url('/driver') }}" class="sidebar-link {{ request()->is('driver*') ? 'active' : '' }}">
            <span>👤</span>
            Driver
        </a>

        <a href="{{ url('/bengkel') }}" class="sidebar-link {{ request()->is('bengkel*') ? 'active' : '' }}">
            <span>🔧</span>
            Bengkel Maintenance
        </a>

    </nav>

    <div class="sidebar-bottom">
        <p>Rental Mobil System</p>
        <small>Administrator Panel</small>
    </div>
</aside>