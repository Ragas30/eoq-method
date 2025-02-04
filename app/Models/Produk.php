<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
