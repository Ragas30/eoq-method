<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "supplier";

    protected $primaryKey = "id_supplier";

    public $timestamps = false;

    protected $fillable = [
        'nm_supplier',
        'alamat',
        'email',
        'nohp',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_supplier', 'id_supplier');
    }
}
