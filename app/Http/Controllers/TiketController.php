<?php

// TiketController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pembayarans = Pembayaran::where('user_id', $user->id)->with(['lapangan', 'fase'])->get();

        return view('tiket', compact('pembayarans'));
    }
}

