<?php

use Illuminate\Database\Seeder;
use App\Models\JenisLapangan;

class JenisLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan item-item default ke dalam tabel jenis_lapangan
        JenisLapangan::create(['nama' => 'Sepak Bola']);
        JenisLapangan::create(['nama' => 'Futsal']);
        JenisLapangan::create(['nama' => 'Mini Soccer']);
        JenisLapangan::create(['nama' => 'Basket']);
        JenisLapangan::create(['nama' => 'Badminton']);
    }
}
