<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Driver - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    @include('layouts.sidebar')

    <main class="dashboard-content">
        <div class="armada-container">
            <div class="armada-header">
                <div>
                    <h1>Detail Profil Driver</h1>
                    <p>Informasi lengkap pengemudi.</p>
                </div>
            </div>

            <div class="card p-4 shadow-sm mb-3">
                <p><strong>Nama Driver:</strong> {{ $driver->nama }}</p>
                <p><strong>Nomor SIM:</strong> {{ $driver->nomor_sim }}</p>
                <p><strong>Status SIM:</strong> {{ $driver->status }}</p>
                <p class="mb-0"><strong>Kontak:</strong> {{ $driver->kontak }}</p>
            </div>

            <a href="{{ route('profil_driver.index') }}" class="back-link">
                ← Kembali ke Daftar Driver
            </a>
        </div>
    </main>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>