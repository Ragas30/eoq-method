<?php

namespace App\Models;

use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";

    protected $primaryKey = "kd_produk";

    public $timestamps = false;

    protected $fillable = [
        'kd_produk',
        'nm_produk',
        'stok',
        'satuan',
        'harga', // Harga jual ke konsumen
        'harga_beli', // Harga beli per satuan
        'deskripsi',
        'gambar',
        'lead_time',
        'b_pesan',
        'b_simpan',
        'stok_cadangan',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'kd_produk' => 'string',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'kd_produk', 'kd_produk');
    }

    public function uraianTransaksi()
    {
        return $this->hasMany(UraianTransaksi::class, 'kd_produk', 'kd_produk');
    }
}
