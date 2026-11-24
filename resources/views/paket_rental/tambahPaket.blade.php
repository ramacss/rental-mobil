<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket Rental - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<main class="form-container">

    <div class="form-header">
        <div>
            <h1>Tambah Paket Rental</h1>
            <p>Tambahkan paket rental baru ke sistem rental mobil.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Data belum valid.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paket-rental.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_paket">Nama Paket</label>
            <input
                type="text"
                id="nama_paket"
                name="nama_paket"
                value="{{ old('nama_paket') }}"
                placeholder="Contoh: Lepas Kunci"
                maxlength="255"
                required
            >
            @error('nama_paket')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="durasi_sewa">Durasi Sewa</label>
            <input
                type="number"
                id="durasi_sewa"
                name="durasi_sewa"
                value="{{ old('durasi_sewa') }}"
                placeholder="Contoh: 1"
                min="1"
                required
            >
            @error('durasi_sewa')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="ketentuan">Ketentuan</label>
            <textarea
                id="ketentuan"
                name="ketentuan"
                rows="4"
                placeholder="Masukkan ketentuan paket rental..."
                required
            >{{ old('ketentuan') }}</textarea>
            @error('ketentuan')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('paket-rental.index') }}" class="form-btn btn-cancel">
                Batal
            </a>

            <button type="submit" class="form-btn btn-save">
                Simpan Paket
            </button>
        </div>

    </form>

</main>

</body>
</html>