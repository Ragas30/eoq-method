<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;

class UraianTransaksi extends Model
{
    protected $table = 'uraian_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'kd_produk',
        'qty',
        'hrg'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kd_produk', 'kd_produk');
    }
}
