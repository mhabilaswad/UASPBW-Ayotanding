<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'user_id',
        'lapangan_id',
        'fase_id',
        'booking_date',
        'total_price',
        'bukti_pembayaran',
        'payment_date',
        'full_name',
        'phone_number',
        'email',
    ];

    // Relasi dengan tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel lapangan
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }

    // Relasi dengan tabel fase
    public function fase()
    {
        return $this->belongsTo(Fase::class);
    }
}
