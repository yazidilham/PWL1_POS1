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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id'); // Primary Key (PK)
            $table->unsignedBigInteger('level_id'); // Foreign Key (FK) ke tabel m_level
            $table->string('username', 20)->unique(); // Username maksimal 20 karakter, unik
            $table->string('nama', 100); // Nama maksimal 100 karakter
            $table->string('password', 255); // Password dengan panjang maksimal 255 karakter
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('level_id')->references('level_id')->on('m_level')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
