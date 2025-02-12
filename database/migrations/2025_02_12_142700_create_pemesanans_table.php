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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pesan');
            $table->unsignedInteger('id_supplier');
            $table->date('tgl_pesan');
            $table->integer('jml_beli');
            $table->double('total_beli');

            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
