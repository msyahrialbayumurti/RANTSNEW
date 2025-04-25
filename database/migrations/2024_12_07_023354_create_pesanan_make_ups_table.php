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
        Schema::create('pesanan_make_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('make_ups_id')->constrained('make_ups')->onDelete('cascade');
            $table->foreignId('Users_id')->constrained('Users')->onDelete('cascade');
            $table->date('tanggal_pesanan');
            $table->string('lokasi_pemesanan');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->double('total_harga');
            $table->enum('status_pesanan', allowed: ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_make_ups');
    }
};