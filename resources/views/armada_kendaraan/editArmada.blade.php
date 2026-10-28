<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Armada - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<main class="form-container">

    <div class="form-header">
        <div>
            <h1>Edit Armada</h1>
            <p>Perbarui informasi kendaraan rental mobil.</p>
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

    <form action="{{ route('armada.update', $armada->id_kendaraan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomor_plat">Nomor Plat</label>
            <input
                type="text"
                id="nomor_plat"
                name="nomor_plat"
                value="{{ old('nomor_plat', $armada->nomor_plat) }}"
                placeholder="Contoh: D 1234 AB"
                maxlength="20"
                required
            >
            @error('nomor_plat')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="merk">Merk Kendaraan</label>
            <input
                type="text"
                id="merk"
                name="merk"
                value="{{ old('merk', $armada->merk) }}"
                placeholder="Contoh: Toyota, Honda, BMW"
                maxlength="100"
                required
            >
            @error('merk')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_pembuatan">Tahun Pembuatan</label>
            <input
                type="number"
                id="tahun_pembuatan"
                name="tahun_pembuatan"
                value="{{ old('tahun_pembuatan', $armada->tahun_pembuatan) }}"
                min="1900"
                max="{{ date('Y') }}"
                placeholder="Contoh: 2024"
                required
            >
            @error('tahun_pembuatan')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="transmisi">Transmisi</label>
            <select id="transmisi" name="transmisi" required>
                <option value="">-- Pilih Transmisi --</option>
                <option value="Manual" @selected(old('transmisi', $armada->transmisi) == 'Manual')>
                    Manual
                </option>
                <option value="Automatic" @selected(old('transmisi', $armada->transmisi) == 'Automatic')>
                    Automatic
                </option>
            </select>
            @error('transmisi')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status Kendaraan</label>
            <select id="status" name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Tersedia" @selected(old('status', $armada->status) == 'Tersedia')>
                    Tersedia
                </option>
                <option value="Disewa" @selected(old('status', $armada->status) == 'Disewa')>
                    Disewa
                </option>
                <option value="Perawatan" @selected(old('status', $armada->status) == 'Perawatan')>
                    Perawatan
                </option>
            </select>
            @error('status')
                <small class="field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('armada.index') }}" class="form-btn btn-cancel">
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