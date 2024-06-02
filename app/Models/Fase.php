<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    use HasFactory;

    protected $table = 'fase'; // Sesuaikan dengan nama tabel di database jika berbeda

    protected $fillable = ['lapangan_id', 'jam_mulai', 'jam_berakhir', 'harga'];

    // Definisikan relasi dengan model Lapangan
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}