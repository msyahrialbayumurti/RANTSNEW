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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');

            // Kolom Polimorfik
            // riwayatable_id akan menyimpan ID dari pesanan (misal: ID dari pesanan_make_ups)
            // riwayatable_type akan menyimpan nama model (misal: App\Models\PesananMakeUp)
            $table->morphs('riwayatable');

            $table->string('judul'); // Judul/Nama layanan, misal: "Make Up Wisuda"
            $table->text('deskripsi')->nullable(); // Deskripsi singkat
            $table->double('total_harga');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('status'); // Selesai, Dibatalkan, dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};