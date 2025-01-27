<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin1234'), // Menggunakan bcrypt untuk enkripsi password
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'pimpinan',
            'password' => bcrypt('pimpinan1234'),
            'role' => 'pimpinan',
        ]);

        User::create([
            'username' => 'pelanggan',
            'password' => bcrypt('pelanggan1234'),
            'role' => 'pelanggan',
        ]);
    }
}
