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
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id('barang_id'); // Primary Key (PK)
            $table->unsignedBigInteger('kategori_id'); // Foreign Key (FK) ke tabel m_kategori
            $table->string('barang_kode', 10)->unique(); // Kode barang, maksimal 10 karakter, unik
            $table->string('barang_nama', 100); // Nama barang, maksimal 100 karakter
            $table->integer('harga_beli'); // Harga beli barang
            $table->integer('harga_jual'); // Harga jual barang
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
