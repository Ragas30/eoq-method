<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    // Nama tabel (opsional kalau sudah sesuai konvensi Laravel)
    protected $table = 'keranjang';

    // Primary key (karena tidak menggunakan 'id' default)
    protected $primaryKey = 'id_keranjang';

    // Tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi
    protected $fillable = [
        'id_pelanggan',
        'kd_produk',
        'jumlah',
        'harga',
    ];

    /**
     * Relasi ke model Pelanggan
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    /**
     * Relasi ke model Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kd_produk', 'kd_produk');
    }
}
