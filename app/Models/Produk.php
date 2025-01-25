<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";

    protected $primaryKey = "kd_produk_id";

    protected $fillable = [
        'nm_produk',
        'stok',
        'satuan',
        'harga',
        'harga_beli',
        'deskripsi',
        'gambar',
        'lead_time',
        'b_pesan',
        'b_simpan',
        'stok_cadangan',
    ];
}
