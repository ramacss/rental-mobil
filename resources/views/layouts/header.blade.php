<header class="dashboard-header">
    <div class="header-left">
        <h2>Rental Mobil</h2>
        <span>Management System</span>
    </div>


    <div class="header-right">

        <div class="dropdown">

            <button class="user-dropdown-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div class="user-detail">
                    <strong>{{ auth()->user()->name }}</strong>
                    <span>{{ auth()->user()->namaLengkap }}</span>
                </div>

                <span class="dropdown-arrow">▾</span>

            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li class="dropdown-header">
                    Akun Saya
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('profile.editProfile') }}">
                        <span>⚙️</span>
                        Pengaturan Akun
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="dropdown-item text-danger">
                            <span>↪</span>
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</header>
