@extends('layouts.app')

@section('title', 'Data Bengkel')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Data Bengkel Maintenance</h1>
            <p>Kelola data bengkel mitra perawatan kendaraan.</p>
        </div>
        <div class="current-date">{{ now()->translatedFormat('l, d F Y') }}</div>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="armada-container">
        <div class="armada-header">
            <div>
                <h1>Daftar Bengkel</h1>
                <p>Data bengkel yang tersimpan di database RentalMobil.</p>
            </div>
            <a href="{{ route('bengkel.create') }}" class="btn btn-primary">+ Tambah Bengkel</a>
        </div>

        <div class="table-wrapper">
            <table class="armada-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Bengkel</th>
                        <th>Lokasi</th>
                        <th>Kontak</th>
                        <th>Jenis Layanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bengkels as $bengkel)
                        <tr>
                            <td>{{ $bengkel->id_bengkel }}</td>
                            <td><strong>{{ $bengkel->nama_bengkel }}</strong></td>
                            <td>{{ $bengkel->lokasi ?: '-' }}</td>
                            <td>{{ $bengkel->kontak ?: '-' }}</td>
                            <td>{{ $bengkel->jenis_layanan ?: '-' }}</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('bengkel.edit', $bengkel->id_bengkel) }}"
                                       class="btn btn-edit">Edit</a>

                                    <form class="delete-form"
                                          action="{{ route('bengkel.destroy', $bengkel->id_bengkel) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data bengkel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-data">Belum ada data bengkel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
