<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pesan';

    public $timestamps = false;

    protected $fillable = ['id_supplier', 'tgl_pesan', 'jml_beli', 'total_beli'];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }
}
