<?php

namespace App\Http\Controllers;

use App\Models\PaketRental;
use Illuminate\Http\Request;

class PaketRentalController extends Controller
{
    /**
     * Menampilkan semua data paket rental.
     */
    public function index()
    {
        $paket = PaketRental::orderBy('id_paket', 'asc')->get();

        return view('paket_rental.paketRental', compact('paket'));
    }

    /**
     * Menampilkan halaman form tambah paket.
     */
    public function create()
    {
        return view('paket_rental.tambahPaket');
    }

    /**
     * Menyimpan paket rental baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'durasi_sewa' => 'required|integer|min:1',
            'ketentuan' => 'required|string',
        ]);

        PaketRental::create($validated);

        return redirect()
            ->route('paket-rental.index')
            ->with('success', 'Paket rental berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman form edit paket.
     */
    public function edit($id)
    {
        $paket = PaketRental::findOrFail($id);

        // Return View Edit
        return view('paket_rental.editPaket' , compact('paket'));
    }

    /**
     * Mengupdate data paket rental.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'durasi_sewa' => 'required|integer|min:1',
            'ketentuan' => 'required|string',
        ]);

        $paket = PaketRental::findOrFail($id);

        $paket->update($validated);

        return redirect()
            ->route('paket-rental.index')
            ->with('success', 'Paket rental berhasil diperbarui.');
    }

    /**
     * Menghapus data paket rental.
     */
    public function destroy($id)
    {
        $paket = PaketRental::findOrFail($id);

        //Delete Paket
        $paket->delete();

        return redirect()
            ->route('paket-rental.index')
            ->with('success', 'Paket rental berhasil dihapus.');
    }

    
}
