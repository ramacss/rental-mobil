
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile - Rental Mobil</title>

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
                <h1>Edit Profile</h1>
                <p>Kelola informasi akun kamu.</p>
            </div>
        </div>

        @if (session('success_profile'))
            <div class="alert alert-success">
                {{ session('success_profile') }}
            </div>
        @endif

        <!-- INFORMASI PROFIL -->
        <section class="dashboard-section">

            <h2 class="mb-4">Informasi Profil</h2>

            <form action="{{ route('profile.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>

                    <input type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', auth()->user()->namaLengkap) }}"
                        required>

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', auth()->user()->email) }}"
                        required>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </form>

        </section>

        <!-- KEAMANAN AKUN -->
        <section class="dashboard-section">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h2 class="mb-2">Keamanan Akun</h2>

                    <p class="text-muted mb-0">
                        Ubah password untuk menjaga keamanan akun kamu.
                    </p>
                </div>

                <a href="{{ route('profile.password.edit') }}"
                    class="btn btn-outline-primary">
                    Ganti Password
                </a>

            </div>

        </section>

        <a href="{{ route('dashboard') }}" class="back-link">
            ← Kembali ke Dashboard
        </a>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
