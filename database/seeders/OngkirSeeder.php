<?php

namespace Database\Seeders;

use App\Models\Ongkir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ongkir::factory(10)->create();
    }
}
