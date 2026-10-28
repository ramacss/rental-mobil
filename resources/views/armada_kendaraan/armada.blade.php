<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armada Kendaraan - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="armada-container">

        <div class="armada-header">
            <div>
                <h1>Armada Kendaraan</h1>
                <p>Kelola data kendaraan rental mobil.</p>
            </div>

            <a href="{{ route('armada.create') }}" class="btn btn-primary">
                + Tambah Kendaraan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-wrapper">
            <table class="armada-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Plat</th>
                        <th>Merk</th>
                        <th>Tahun Pembuatan</th>
                        <th>Transmisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($armada as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_plat }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->tahun_pembuatan }}</td>
                            <td>{{ $item->transmisi }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="aksi">
                                <a href="{{ route('armada.edit', $item->id_kendaraan) }}" class="btn btn-edit">
                                    Edit
                                </a>

                                <button type="button" class="btn btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus{{ $item->id_kendaraan }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalHapus{{ $item->id_kendaraan }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus Armada</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        Yakin ingin menghapus {{ $item->merk }}
                                        dengan nomor plat {{ $item->nomor_plat }}?
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Batal
                                        </button>

                                        <form action="{{ route('armada.destroy', $item->id_kendaraan) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                Ya, Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="modalHapus{{ $item->id_kendaraan }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus Armada</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>

                                                <div class="modal-body">
                                                    Yakin ingin menghapus kendaraan
                                                    <strong>{{ $item->merk }}</strong>
                                                    dengan nomor plat
                                                    <strong>{{ $item->nomor_plat }}</strong>?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form action="{{ route('armada.destroy', $item->id_kendaraan) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            Ya, Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-data">
                                Belum ada data kendaraan.
                            </td>
                        </tr>
                    @endforelse
            </table>
        </div>

        <a href="{{ url('/dashboard') }}" class="back-link">
            Kembali ke Dashboard
        </a>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>