<?php

namespace Database\Seeders;

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
        // Tambahkan item-item default ke dalam tabel jenis_lapangan dengan id
        JenisLapangan::create(['id' => 1, 'nama' => 'Sepak Bola']);
        JenisLapangan::create(['id' => 2, 'nama' => 'Futsal']);
        JenisLapangan::create(['id' => 3, 'nama' => 'Mini Soccer']);
        JenisLapangan::create(['id' => 4, 'nama' => 'Basket']);
        JenisLapangan::create(['id' => 5, 'nama' => 'Badminton']);
    }
}
