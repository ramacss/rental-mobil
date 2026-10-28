<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function index()
    {
        $armada = Armada::orderBy('id_kendaraan', 'asc')->get();

        return view('armada_kendaraan.armada', compact('armada'));
    }

    public function create()
    {
        return view('armada_kendaraan.tambahArmada');
    }

    // Menyimpan armada baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_plat' => 'required|string|max:20|unique:armada_kendaraan,nomor_plat',
            'merk' => 'required|string|max:100',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'transmisi' => 'required|in:Manual,Automatic',
            'status' => 'required|in:Tersedia,Disewa,Perawatan',
        ]);

        Armada::create($validated);

        return redirect()
            ->route('armada.index')
            ->with('success', 'Armada berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $armada = Armada::findOrFail($id);

        return view('armada_kendaraan.editArmada', compact('armada'));
    }

    // Memperbarui armada
    public function update(Request $request, $id)
    {
        $armada = Armada::findOrFail($id);

        $validated = $request->validate([
            'nomor_plat' => 'required|string|max:20|unique:armada_kendaraan,nomor_plat,' . $armada->id_kendaraan . ',id_kendaraan',
            'merk' => 'required|string|max:100',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'transmisi' => 'required|in:Manual,Automatic',
            'status' => 'required|in:Tersedia,Disewa,Perawatan',
        ]);

        $armada->update($validated);

        return redirect()
            ->route('armada.index')
            ->with('success', 'Armada berhasil diperbarui.');
    }

    // Menghapus armada
    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);
        $armada->delete();

        return redirect()
            ->route('armada.index')
            ->with('success', 'Armada berhasil dihapus.');
    }
}