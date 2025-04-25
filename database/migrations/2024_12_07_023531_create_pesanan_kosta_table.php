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
        Schema::create('pesanan_kosta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kosta_id')->constrained('kosta')->onDelete('cascade');
            $table->foreignId('Users_id')->constrained('Users')->onDelete('cascade');
            $table->dateTime('waktu_pemakaian_mulai');
            $table->dateTime('waktu_pemakaian_selesai');
            $table->double('total_harga');
            $table->enum('status_pesanan', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_kosta');
    }
};