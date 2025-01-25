<?php

namespace App\Models;

use App\Models\Ongkir;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'id_tempat',
        'kd_pesanan',
        'tgl_pesan',
        'total',
        'status',
        'bukti',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function ongkir()
    {
        return $this->belongsTo(Ongkir::class, 'id_tempat', 'id_tempat');
    }
}
