<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayananPembayaran;

class LayananPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan item-item default ke dalam tabel layanan_pembayaran dengan id
        LayananPembayaran::create(['id' => 1, 'layanan' => 'BSI']);
        LayananPembayaran::create(['id' => 2, 'layanan' => 'BCA']);
        LayananPembayaran::create(['id' => 3, 'layanan' => 'BCA Syariah']);
        LayananPembayaran::create(['id' => 4, 'layanan' => 'OVO']);
        LayananPembayaran::create(['id' => 5, 'layanan' => 'GOPAY']);
    }
}