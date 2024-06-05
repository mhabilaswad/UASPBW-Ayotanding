<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $lapangans = Lapangan::all(); // Mengambil semua data lapangan dari database
        return view('admin.dashboard', compact('lapangans')); // Mengirimkan data lapangan ke view
    }

    public function detail($id)
    {
        $lapangans = Lapangan::with('fases', 'jenisLapangan', 'layananPembayaran')->findOrFail($id); // Mengambil semua data lapangan dari database
        return view('lapangan.detailAdmin', compact('lapangans')); // Mengirimkan data lapangan ke view
    }

    public function approve(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $lapangan->approved = 1; // Mengubah status approve menjadi 1
        $lapangan->save();
        return redirect()->route('admin.dashboard')->with('success', 'Lapangan berhasil diapprove.');
    }

    public function reject(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $lapangan->delete(); // Menghapus lapangan dari basis data
        return redirect()->route('admin.dashboard')->with('success', 'Lapangan berhasil ditolak.');
    }
}