<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;

class UraianTransaksi extends Model
{
    protected $table = 'uraian_transaksi';
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
}
