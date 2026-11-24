<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Driver - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    @include('layouts.header')

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <!-- KONTEN UTAMA -->
    <main class="dashboard-content">
        <div class="armada-container">

            <!-- JUDUL HALAMAN -->
            <div class="armada-header">
                <div>
                    <h1>Profil Driver</h1>
                    <p>Kelola data pengemudi rental mobil.</p>
                </div>

                <a href="{{ route('profil_driver.create') }}" class="btn btn-primary">
                    + Tambah Driver
                </a>
            </div>

            <!-- NOTIFIKASI SUKSES -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- NOTIFIKASI ERROR -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TABEL DRIVER -->
            <div class="table-wrapper">
                <table class="armada-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Driver</th>
                            <th>Nomor SIM</th>
                            <th>Status</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drivers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nomor_sim }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td class="aksi">
                                    <a href="{{ route('profil_driver.show', $item->id) }}" class="btn btn-info btn-sm">
                                        Detail
                                    </a>
                                    <a href="{{ route('profil_driver.edit', $item->id) }}" class="btn btn-edit">
                                        Edit
                                    </a>
                                    <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $item->id }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-data">
                                    Belum ada data driver.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- TOMBOL KEMBALI -->
            <a href="{{ route('dashboard') }}" class="back-link">
                ← Kembali ke Dashboard
            </a>

        </div>
    </main>

    <!-- MODAL KONFIRMASI HAPUS -->
    @foreach ($drivers as $item)
        <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus Driver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus driver <strong>{{ $item->nama }}</strong>
                        dengan nomor SIM <strong>{{ $item->nomor_sim }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('profil_driver.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- FOOTER -->
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>