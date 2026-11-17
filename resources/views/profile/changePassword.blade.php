
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ganti Password - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    @include('layouts.header')
    @include('layouts.sidebar')

    <main class="dashboard-content">

        <div class="page-heading">
            <div>
                <h1>Ganti Password</h1>
                <p>Perbarui password akun untuk menjaga keamanan.</p>
            </div>
        </div>

        @if (session('success_password'))
            <div class="alert alert-success">
                {{ session('success_password') }}
            </div>
        @endif

        <section class="dashboard-section">

            <h2 class="mb-4">Form Ganti Password</h2>

            <form action="{{ route('profile.password.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Password Saat Ini</label>

                    <input type="password"
                        name="current_password"
                        class="form-control"
                        required>

                    @error('current_password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>

                    <input type="password"
                        name="password"
                        class="form-control"
                        required>

                    <small class="text-muted">
                        Password minimal 8 karakter.
                    </small>

                    @error('password')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>

                    <input type="password"
                        name="password_confirmation"
                        class="form-control"
                        required>
                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        Perbarui Password
                    </button>

                    <a href="{{ route('profile.editProfile') }}"
                        class="btn btn-secondary">
                        Batal
                    </a>

                </div>

            </form>

        </section>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
