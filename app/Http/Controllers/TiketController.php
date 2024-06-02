<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    public function index()
    {
        // Ambil data pembayaran milik pengguna yang sedang login
        $pembayarans = Pembayaran::where('user_id', Auth::id())->get();

        // Kirim data pembayaran ke halaman tiket.blade.php
        return view('tiket', compact('pembayarans'));
    }
}
