@extends('layouts.app')

@section('title', 'Edit Bengkel')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Edit Bengkel</h1>
            <p>Perbarui informasi bengkel mitra perawatan kendaraan.</p>
        </div>
    </div>

    <section class="form-container">
        <div class="form-header">
            <h1>Form Edit Bengkel</h1>
            <p>Ubah informasi untuk <strong>{{ $bengkel->nama_bengkel }}</strong>.</p>
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

        <form action="{{ route('bengkel.update', $bengkel->id_bengkel) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_bengkel">Nama Bengkel</label>
                <input type="text" id="nama_bengkel" name="nama_bengkel"
                       value="{{ old('nama_bengkel', $bengkel->nama_bengkel) }}"
                       maxlength="100" required>
                @error('nama_bengkel') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi"
                       value="{{ old('lokasi', $bengkel->lokasi) }}" required>
                @error('lokasi') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" id="kontak" name="kontak"
                       value="{{ old('kontak', $bengkel->kontak) }}"
                       maxlength="20" required>
                @error('kontak') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan"
                       value="{{ old('jenis_layanan', $bengkel->jenis_layanan) }}"
                       maxlength="100" required>
                @error('jenis_layanan') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('bengkel.index') }}" class="form-btn btn-cancel">Batal</a>
                <button type="submit" class="form-btn btn-save">Simpan Perubahan</button>
            </div>
        </form>
    </section>
@endsection
