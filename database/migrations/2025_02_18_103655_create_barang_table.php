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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kategori');
            $table->string('nama_barang');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->unsignedBigInteger('suplier_id');
            $table->unsignedBigInteger('gerai_id');
            $table->foreign('suplier_id')->references('id')->on('suplier')->onDelete('cascade');
            $table->foreign('gerai_id')->references('id')->on('gerai')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
