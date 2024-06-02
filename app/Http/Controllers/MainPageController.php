<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lapangan;
use App\Models\Fase;

class MainPageController extends Controller
{
    public function mainView()
    {
        // Mengambil semua lapangan yang approved
        $lapangans = Lapangan::where('approved', 1)->get();

        return view('main', compact('lapangans'));
    }

    public function detail($id)
    {
        $lapangan = Lapangan::with('fases', 'jenisLapangan', 'layananPembayaran')->findOrFail($id);
        $fases = $lapangan->fases()->get();
        return view('lapangan.detail', compact('lapangan'));
    }
}
