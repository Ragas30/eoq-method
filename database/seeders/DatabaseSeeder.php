<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OngkirSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\SupplierSeeder;
use Database\Seeders\TransaksiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            PelangganSeeder::class,
            OngkirSeeder::class,
            SupplierSeeder::class,
            // ProdukSeeder::class,
            // TransaksiSeeder::class
        ]);
    }
}
