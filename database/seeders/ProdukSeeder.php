<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Produk::factory(50)->create();
        Produk::create([
            'kd_produk' => 'PRD0001',
            'nm_produk' => 'Semen Tiga Roda 50kg',
            'stok' => 200,
            'satuan' => 'Sak',
            'harga' => 75000,
            'harga_beli' => 60000,
            'lead_time' => 2,
            'b_pesan' => 15000,
            'b_simpan' => 0.20 * 60000,
            'deskripsi' => 'Semen berkualitas tinggi untuk konstruksi',
            'gambar' => 'uploads/produk/semen_tiga_roda.png'
        ]);

        Produk::create([
            'kd_produk' => 'PRD0002',
            'nm_produk' => 'Cat Tembok Dulux 5L',
            'stok' => 150,
            'satuan' => 'Kaleng',
            'harga' => 120000,
            'harga_beli' => 95000,
            'lead_time' => 3,
            'b_pesan' => 20000,
            'b_simpan' => 0.20 * 95000,
            'deskripsi' => 'Cat tembok anti-pudar dengan warna tahan lama',
            'gambar' => 'uploads/produk/cat_dulux_5l.jpg'
        ]);

        Produk::create([
            'kd_produk' => 'PRD0003',
            'nm_produk' => 'Pipa PVC 3 Inch 4m',
            'stok' => 300,
            'satuan' => 'Batang',
            'harga' => 45000,
            'harga_beli' => 35000,
            'lead_time' => 1,
            'b_pesan' => 10000,
            'b_simpan' => 0.20 * 35000,
            'deskripsi' => 'Pipa PVC kuat dan tahan lama untuk saluran air',
            'gambar' => 'uploads/produk/pipa_pvc_3inch.png'
        ]);

        Produk::create([
            'kd_produk' => 'PRD0004',
            'nm_produk' => 'Keramik Roman 40x40',
            'stok' => 500,
            'satuan' => 'Dus',
            'harga' => 150000,
            'harga_beli' => 120000,
            'lead_time' => 5,
            'b_pesan' => 25000,
            'b_simpan' => 0.20 * 120000,
            'deskripsi' => 'Keramik lantai motif minimalis ukuran 40x40 cm',
            'gambar' => 'uploads/produk/keramik_roman_40x40.jpg'
        ]);

        Produk::create([
            'kd_produk' => 'PRD0005',
            'nm_produk' => 'Kayu Balok 5x10cm 4m',
            'stok' => 250,
            'satuan' => 'Batang',
            'harga' => 60000,
            'harga_beli' => 50000,
            'lead_time' => 4,
            'b_pesan' => 18000,
            'b_simpan' => 0.20 * 50000,
            'deskripsi' => 'Kayu balok kuat untuk rangka bangunan',
            'gambar' => 'uploads/produk/kayu_balok_5x10.webp'
        ]);
    }
}
