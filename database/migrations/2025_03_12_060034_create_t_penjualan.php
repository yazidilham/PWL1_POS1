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
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id'); // Primary Key (PK)
            $table->unsignedBigInteger('user_id'); // Foreign Key (FK) ke tabel m_user
            $table->string('pembeli', 50); // Nama pembeli, maksimal 50 karakter
            $table->string('penjualan_kode', 20)->unique(); // Kode penjualan, maksimal 20 karakter, unik
            $table->dateTime('penjualan_tanggal'); // Tanggal dan waktu penjualan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
