<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel

    protected $primaryKey = 'id_pelanggan'; // Primary key

    public $timestamps = false; // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'id_user',
        'nm_lengkap',
        'email',
        'jk',
        'telp',
        'alamat',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'id_pelanggan', 'id_pelanggan');
    }
}
