<?php

namespace Database\Factories;

use App\Models\Ongkir;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileType = $this->faker->randomElement(['image', 'pdf']);
        $fileName = time() . '_' . uniqid();
        $uploadPath = public_path('uploads/bukti');

        // Pastikan folder uploads/bukti ada
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($fileType === 'image') {
            // Generate gambar dummy
            $buktiFile = $fileName . '.jpg';
            $this->faker->image($uploadPath, 640, 480, null, false);
        } else {
            // Generate dummy PDF
            $buktiFile = $fileName . '.pdf';
            file_put_contents($uploadPath . '/' . $buktiFile, '%PDF-1.4 fake pdf content');
        }

        return [
            'id_pelanggan' => Pelanggan::factory(),  // Selalu gunakan id_pelanggan 3
            'id_tempat'    => Ongkir::factory(),  // Masih random id_tempat
            'tgl_pesan'    => $this->faker->date(),
            'total'        => $this->faker->numberBetween(10000, 1000000),
            'status'       => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'bukti'        => 'uploads/bukti/' . $buktiFile,
        ];
    }
}
