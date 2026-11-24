<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Paket Rental - Rental Mobil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="dashboard-content">

        <div class="armada-container">

            <!-- Header Halaman -->
            <div class="armada-header">
                <div>
                    <h2>Paket Rental</h2>
                    <p>Kelola daftar paket rental kendaraan.</p>
                </div>

                <a href="{{ route('paket-rental.create') }}"
                   class="btn btn-primary">
                    + Tambah Paket
                </a>
            </div>

            <!-- Tabel Paket Rental -->
            <div class="table-wrapper">

                <table class="armada-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Durasi Sewa</th>
                            <th>Ketentuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($paket as $index => $item)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $item->nama_paket }}
                                </td>

                                <td>
                                    {{ $item->durasi_sewa }} Hari
                                </td>

                                <td>
                                    {{ $item->ketentuan }}
                                </td>

                                <td class="aksi">

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('paket-rental.edit', $item->id_paket) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button type="button"
                                            class="btn btn-delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#hapusModal{{ $item->id_paket }}">
                                        Hapus
                                    </button>

                                </td>
                            </tr>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade"
                                 id="hapusModal{{ $item->id_paket }}"
                                 tabindex="-1"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Konfirmasi Hapus
                                            </h5>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal">
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            Apakah kamu yakin ingin menghapus
                                            paket rental
                                            <strong>{{ $item->nama_paket }}</strong>?

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <form action="{{ route('paket-rental.destroy', $item->id_paket) }}"
                                                  method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger">
                                                    Ya, Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>
                                <td colspan="5" class="empty-data">
                                    Belum ada data paket rental.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Tombol Kembali -->
            <div class="back-link">
                <a href="{{ url('/') }}">
                    ← Kembali
                </a>
            </div>

        </div>

    </main>

    <!-- Bootstrap JavaScript untuk modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>