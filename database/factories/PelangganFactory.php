<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::factory(),
            'nm_lengkap' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'telp' => substr($this->faker->phoneNumber, 0, 12),
            'alamat' => $this->faker->address,
        ];
    }
}
