<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('kd_produk', 10)->primary();
            $table->text('nm_produk');
            $table->integer('stok');
            $table->text('satuan');
            $table->integer('harga');
            $table->integer('harga_beli');
            $table->text('deskripsi');
            $table->text('gambar');
            $table->double('lead_time');
            $table->double('b_pesan');
            $table->double('b_simpan');
            $table->double('stok_cadangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
