<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_produk'    => strtoupper(Str::random(10)), // Kode produk unik (10 karakter)
            'nm_produk'    => $this->faker->words(3, true), // Nama produk acak
            'stok'         => $this->faker->numberBetween(10, 100), // Stok antara 10-100
            'satuan'       => $this->faker->randomElement(['pcs', 'box', 'kg', 'liter']), // Satuan acak
            'harga'        => $this->faker->numberBetween(10000, 1000000), // Harga jual
            'harga_beli'   => $this->faker->numberBetween(5000, 900000), // Harga beli
            'deskripsi'    => $this->faker->sentence(10), // Deskripsi singkat
            'gambar'       => $this->faker->imageUrl(640, 480, 'products', true), // URL gambar
            'lead_time'    => $this->faker->randomFloat(2, 1, 10), // Lead time (misalnya 1.25 hari)
            'b_pesan'      => $this->faker->randomFloat(2, 50, 500), // Biaya pesan
            'b_simpan'     => $this->faker->randomFloat(2, 20, 200), // Biaya simpan
            'stok_cadangan'=> $this->faker->randomFloat(2, 5, 50), // Stok cadangan
        ];
    }
}
