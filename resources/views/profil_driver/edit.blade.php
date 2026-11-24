<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Driver - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<main class="form-container">

    <div class="form-header">
        <div>
            <h1>Edit Profil Driver</h1>
            <p>Perbarui informasi pengemudi rental mobil.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            <strong>Data belum valid.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profil_driver.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Driver</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama', $driver->nama) }}"
                placeholder="Contoh: Budi Santoso"
                maxlength="255"
                required
            >
            @error('nama')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nomor_sim">Nomor SIM</label>
            <input
                type="text"
                id="nomor_sim"
                name="nomor_sim"
                value="{{ old('nomor_sim', $driver->nomor_sim) }}"
                placeholder="Contoh: 123456789012"
                maxlength="50"
                required
            >
            @error('nomor_sim')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status SIM</label>
            <select id="status" name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" @selected(old('status', $driver->status) == 'Aktif')>
                    Aktif
                </option>
                <option value="Tidak Aktif" @selected(old('status', $driver->status) == 'Tidak Aktif')>
                    Tidak Aktif
                </option>
            </select>
            @error('status')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kontak">Kontak (No. HP)</label>
            <input
                type="text"
                id="kontak"
                name="kontak"
                value="{{ old('kontak', $driver->kontak) }}"
                placeholder="Contoh: 081234567890"
                maxlength="20"
                required
            >
            @error('kontak')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('profil_driver.index') }}" class="form-btn btn-cancel">
                Batal
            </a>

            <button type="submit" class="form-btn btn-save">
                Simpan Perubahan
            </button>
        </div>
    </form>

</main>

</body>
</html>