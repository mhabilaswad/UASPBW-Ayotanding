<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LapanganController; // Import LapanganController

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $lapangans = Lapangan::where('user_id', $user->id)->with('pembayarans.fase', 'pembayarans.user')->get();
        return view('user.profile', compact('user', 'lapangans'));
    }

    public function showDaftarLapanganForm()
    {
        return app(LapanganController::class)->showDaftarLapanganForm();
    }
}
