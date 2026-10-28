<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Rental Mobil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="logo">
                RENTAL<span>MOBIL</span>
            </div>

            <h1>Buat Akun</h1>
            <p class="subtitle">Daftarkan akun Anda untuk melanjutkan</p>
            {{-- Pesan error validasi --}}
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{-- Pesan sukses --}}
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama lengkap"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                        required>
                </div>

                <button type="submit" class="btn-primary">Register</button>
            </form>

            <p class="auth-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login sekarang</a>
            </p>
        </div>
    </div>
</body>

</html>
