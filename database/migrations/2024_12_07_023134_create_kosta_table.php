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
        Schema::create('kosta', function (Blueprint $table) {
            $table->id();
            // $table->foreign('jasa_type_id')->references('id')->on('menambahkan_jasa')->onDelete('cascade'); // Menghubungkan ke tabel menambahkan_jasa
            $table->string('nama_kostum');
            $table->string('image');
            $table->integer('jumlah');
            $table->string('warna');
            $table->string('ukuran');
            $table->double('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosta');
    }
};