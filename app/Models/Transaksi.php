<?php

namespace App\Models;

use App\Models\Ongkir;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            $transaksi->kd_pesanan = self::generateKodePesanan();
        });
    }

    private static function generateKodePesanan()
    {
        $prefix = 'ORD';
        $time    = now()->format('Hi');  // Format tanggal: 20250202
        $randomString = strtoupper(substr(md5(uniqid(rand(), true)), 0, 2));

        return "{$prefix}{$time }{$randomString}";
    }
}
