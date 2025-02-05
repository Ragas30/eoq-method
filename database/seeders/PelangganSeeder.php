<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::factory(5)->create();

        Pelanggan::create([
            'id_user' => 3,
            'nm_lengkap' => 'Akun Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'jk' => 'Laki-laki',
            'telp' => '0812345678',
            'alamat' => 'Jakarta',
        ]);
    }
}
