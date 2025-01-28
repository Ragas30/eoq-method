<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;

    protected $table = 'ongkir'; // Nama tabel

    protected $primaryKey = 'id_tempat'; // Primary key tabel

    public $timestamps = false; // Nonaktifkan timestamps jika tidak menggunakan kolom created_at dan updated_at

    protected $fillable = [
        'daerah',  // Nama daerah atau wilayah
        'tarif',   // Tarif ongkir untuk daerah tersebut
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_tempat', 'id_tempat');
    }
}
