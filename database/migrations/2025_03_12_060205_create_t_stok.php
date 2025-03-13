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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id'); // Primary Key (PK)
            $table->unsignedBigInteger('barang_id'); // Foreign Key (FK) ke tabel m_barang
            $table->unsignedBigInteger('user_id'); // Foreign Key (FK) ke tabel m_user
            $table->dateTime('stok_tanggal'); // Tanggal stok masuk/keluar
            $table->integer('stok_jumlah'); // Jumlah stok masuk/keluar
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
