<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesananable_id');  // ID dari model yang berhubungan (contoh: PesananKostum)
            $table->string('pesananable_type');              // Nama model yang berhubungan (contoh: PesananKostum)
            $table->string('jenis_pesanan'); // Kostum, Makeup, Tarian
            $table->decimal('harga', 10, 2);  // Harga pesanan
            $table->string('status_pesanan'); // Status pesanan
            $table->date('tanggal_pesanan');  // Tanggal pesanan
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
