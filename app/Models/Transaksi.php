<?php

namespace App\Models;

use App\Models\Ongkir;
use App\Models\Pelanggan;
use App\Models\UraianTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function uraianTransaksi()
{
    return $this->hasMany(UraianTransaksi::class, 'id_transaksi');
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
