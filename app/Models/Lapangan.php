<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangans';
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'identity_photo',
        'ownership_proof',
        'payment_option',
        'field_name',
        'location',
        'jenis_lapangan_id',
        'description',
        'full_address',
        'field_photo',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisLapangan()
    {
        return $this->belongsTo(JenisLapangan::class, 'jenis_lapangan_id');
    }

    public function layananPembayaran()
    {
        return $this->belongsTo(layananPembayaran::class, 'layanan_pembayaran_id');
    }
    public function fases()
    {
        return $this->hasMany(Fase::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function index()
    {
        // Ambil semua lapangan beserta fase
        $lapangans = Lapangan::with('fase')->get();
        return view('home', compact('lapangans'));
    }

}
