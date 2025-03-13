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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id'); // Primary Key (PK)
            $table->unsignedBigInteger('penjualan_id'); // Foreign Key (FK) ke tabel t_penjualan
            $table->unsignedBigInteger('barang_id'); // Foreign Key (FK) ke tabel m_barang
            $table->integer('harga'); // Harga barang saat transaksi
            $table->integer('jumlah'); // Jumlah barang yang dibeli
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan')->onDelete('cascade');
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
