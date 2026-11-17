<?php

namespace App\Http\Controllers;

use App\Models\Armada;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total armada
        $totalArmada = Armada::count();

        // Menghitung armada berdasarkan status
        $armadaTersedia = Armada::where('status', 'Tersedia')->count();

        $armadaDisewa = Armada::where('status', 'Disewa')->count();

        $armadaPerawatan = Armada::where('status', 'Perawatan')->count();

        // Mengambil 5 armada terbaru
        $armadaTerbaru = Armada::orderBy('id_kendaraan', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalArmada',
            'armadaTersedia',
            'armadaDisewa',
            'armadaPerawatan',
            'armadaTerbaru'
        ));
    }
}
