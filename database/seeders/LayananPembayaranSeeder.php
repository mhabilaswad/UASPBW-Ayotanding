<?php

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
        // Tambahkan item-item default ke dalam tabel layanan_pembayaran
        LayananPembayaran::create(['layanan' => 'BSI']);
        LayananPembayaran::create(['layanan' => 'BCA']);
        LayananPembayaran::create(['layanan' => 'BCA Syariah']);
        LayananPembayaran::create(['layanan' => 'OVO']);
        LayananPembayaran::create(['layanan' => 'GOPAY']);
    }
}
