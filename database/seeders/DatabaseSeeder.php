<?php

use Illuminate\Database\Seeder;
use Database\Seeders\JenisLapanganSeeder;
use Database\Seeders\LayananPembayaranSeeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JenisLapanganSeeder::class);
        $this->call(LayananPembayaranSeeder::class);
        $this->call(UserSeeder::class);
    }
}
