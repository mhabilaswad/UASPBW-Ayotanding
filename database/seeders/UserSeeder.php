<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 3 default users
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin@gmail.com'), // Hash the password
                'role' => 'admin', // Set role as 'admin'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pemilik',
                'email' => 'pemilik@gmail.com',
                'password' => Hash::make('pemilik@gmail.com'),
                'role' => 'pemilik', // Optional: Set role as 'pemilik'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pemesan',
                'email' => 'pemesan@gmail.com',
                'password' => Hash::make('pemesan@gmail.com'),
                'role' => 'pemesan', // Optional: Set role as 'pemesan'
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
