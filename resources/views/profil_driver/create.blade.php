<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Driver - Rental Mobil</title>

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
                    <h1>Tambah Profil Driver</h1>
                    <p>Masukkan data pengemudi baru.</p>
                </div>
            </div>

            <form action="{{ route('profil_driver.store') }}" method="POST" class="card p-4 shadow-sm">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Driver</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Ketik nama di sini..." required>
                </div>

                <div class="mb-3">
                    <label for="nomor_sim" class="form-label">Nomor SIM</label>
                    <input type="text" class="form-control" id="nomor_sim" name="nomor_sim" placeholder="Ketik nomor SIM..." required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status SIM</label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="" disabled selected>Pilih Status...</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak (No. HP)</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="0812..." required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Driver</button>
                    <a href="{{ route('profil_driver.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </main>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>