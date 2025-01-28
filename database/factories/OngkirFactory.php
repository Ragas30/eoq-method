<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ongkir>
 */
class OngkirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = [
            'Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Makassar', 'Semarang',
            'Palembang', 'Denpasar', 'Yogyakarta', 'Malang', 'Banjarmasin',
            'Batam', 'Manado', 'Cirebon', 'Pontianak', 'Mataram', 'Ambon', 'Jayapura'
        ];

        return [
            'daerah' => $this->faker->randomElement($cities),
            'tarif' => $this->faker->numberBetween(5000, 15000),
        ];
    }
}
