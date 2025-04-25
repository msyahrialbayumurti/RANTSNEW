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
        Schema::table('pesanan_penyewaan_jasa_taris', function (Blueprint $table) {
            // Example: Changing jam_pemakaian from integer to string (or time)
            $table->string('jam_pemakaian')->change();
            // Or if you want to change it to a time type:
            // $table->time('jam_pemakaian')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan_penyewaan_jasa_taris', function (Blueprint $table) {
            // Revert the column type change if necessary
            $table->integer('jam_pemakaian')->change();
        });
    }
};
