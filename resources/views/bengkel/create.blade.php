@extends('layouts.app')

@section('title', 'Tambah Bengkel')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Tambah Bengkel</h1>
            <p>Masukkan informasi bengkel mitra baru.</p>
        </div>
    </div>

    <section class="form-container">
        <div class="form-header">
            <h1>Form Tambah Bengkel</h1>
            <p>Lengkapi data bengkel di bawah ini, lalu tekan tombol simpan.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Periksa kembali input lu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bengkel.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_bengkel">Nama Bengkel</label>
                <input type="text" id="nama_bengkel" name="nama_bengkel"
                       value="{{ old('nama_bengkel') }}" maxlength="100"
                       placeholder="Contoh: Bengkel Maju Jaya" required>
                @error('nama_bengkel') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi"
                       value="{{ old('lokasi') }}"
                       placeholder="Masukkan alamat/lokasi bengkel" required>
                @error('lokasi') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" id="kontak" name="kontak"
                       value="{{ old('kontak') }}" maxlength="20"
                       placeholder="Contoh: 081234567890" required>
                @error('kontak') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan"
                       value="{{ old('jenis_layanan') }}" maxlength="100"
                       placeholder="Contoh: Servis mesin dan kelistrikan" required>
                @error('jenis_layanan') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('bengkel.index') }}" class="form-btn btn-cancel">Kembali</a>
                <button type="submit" class="form-btn btn-save">Simpan Bengkel</button>
            </div>
        </form>
    </section>
@endsection
