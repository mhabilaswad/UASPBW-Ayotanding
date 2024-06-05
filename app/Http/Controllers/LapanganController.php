<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Fase; // Import model Fase
use Illuminate\Support\Facades\Auth;

class LapanganController extends Controller
{
    public function showDaftarLapanganForm()
    {
        return view('daftarkanLapangan');    }

    public function storeLapangan(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'identity_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10 MB
            'ownership_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10 MB
            'payment_option' => 'required',
            'field_name' => 'required',
            'location' => 'required',
            'jenis_lapangan_id' => 'required',
            'description' => 'nullable',
            'full_address' => 'required',
            'field_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10 MB
            'jam_mulai' => 'required|array',
            'jam_mulai.*' => 'required|date_format:H:i',
            'jam_berakhir' => 'required|array',
            'jam_berakhir.*' => 'required|date_format:H:i',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric',
        ]);

        // Simpan file foto identitas jika ada
        if ($request->hasFile('identity_photo')) {
            $identityPhotoPath = $request->file('identity_photo')->store('identity_photos', 'public');
        }

        // Simpan file foto bukti kepemilikan jika ada
        if ($request->hasFile('ownership_proof')) {
            $ownershipProofPath = $request->file('ownership_proof')->store('ownership_proofs', 'public');
        }

        // Simpan file foto lapangan jika ada
        if ($request->hasFile('field_photo')) {
            $fieldPhotoPath = $request->file('field_photo')->store('field_photos', 'public');
        }

        $lapangan = new Lapangan();
        $lapangan->user_id = Auth::id(); // Pastikan user_id valid
        $lapangan->full_name = $request->full_name;
        $lapangan->phone_number = $request->phone_number;
        $lapangan->email = $request->email;
        $lapangan->identity_photo = basename($identityPhotoPath) ?? null;
        $lapangan->ownership_proof = basename($ownershipProofPath) ?? null;
        $lapangan->payment_option = $request->payment_option;
        $lapangan->field_name = $request->field_name;
        $lapangan->location = $request->location;
        $lapangan->jenis_lapangan_id = $request->jenis_lapangan_id;
        $lapangan->description = $request->description;
        $lapangan->full_address = $request->full_address;
        $lapangan->field_photo = basename($fieldPhotoPath) ?? null; // Simpan hanya nama file
        $lapangan->approved = false; // Default value for approved
        $lapangan->layanan_pembayaran_id = $request->layanan_pembayaran_id;

        $lapangan->save();

        // Simpan data fase waktu penyewaan
        $jam_mulai = $request->jam_mulai;
        $jam_berakhir = $request->jam_berakhir;
        $harga = $request->harga;

        for ($i = 0; $i < count($jam_mulai); $i++) {
            $fase = new Fase();
            $fase->lapangan_id = $lapangan->id;
            $fase->jam_mulai = $jam_mulai[$i];
            $fase->jam_berakhir = $jam_berakhir[$i];
            $fase->harga = $harga[$i];
            $fase->save();
        }

        return redirect()->route('profile')->with('success', 'Lapangan berhasil didaftarkan.');
    }
}