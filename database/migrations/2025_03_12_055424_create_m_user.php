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
        if (!Schema::hasTable('detail_penjualan')) {
            Schema::create('detail_penjualan', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('penjualan_id');
                $table->unsignedBigInteger('barang_id');
                $table->integer('harga');
                $table->integer('jumlah');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
