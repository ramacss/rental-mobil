<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hapus Paket Rental</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="form-container">

    <div class="form-header">
        <h1>Hapus Paket Rental</h1>
        <p>Konfirmasi penghapusan data paket rental</p>
    </div>

    <div class="alert-error">
        <strong>Apakah kamu yakin ingin menghapus paket ini?</strong>
        <p>
            Data yang sudah dihapus tidak dapat dikembalikan.
        </p>
    </div>

    <div class="form-group">
        <label>Nama Paket</label>

        <input
            type="text"
            value="{{ $paket->nama_paket }}"
            disabled
        >
    </div>

    <div class="form-group">
        <label>Durasi Sewa</label>

        <input
            type="text"
            value="{{ $paket->durasi_sewa }} hari"
            disabled
        >
    </div>

    <div class="form-group">
        <label>Ketentuan</label>

        <textarea
            rows="5"
            disabled
        >{{ $paket->ketentuan }}</textarea>
    </div>

    <div class="form-actions">

        <a
            href="{{ route('paket-rental.index') }}"
            class="form-btn btn-cancel"
        >
            Batal
        </a>

        <form
            action="{{ route('paket-rental.destroy', $paket->id_paket) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="form-btn btn-delete"
            >
                Ya, Hapus
            </button>
        </form>

    </div>

</div>

</body>
</html>