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
        Schema::table('pesanan_kosta', function (Blueprint $table) {
            // Drop existing datetime columns
            $table->dropColumn('waktu_pemakaian_mulai');
            $table->dropColumn('waktu_pemakaian_selesai');

            // Add new date columns
            $table->date('tanggal_pemakaian_mulai')->after('Users_id');
            $table->date('tanggal_pemakaian_selesai')->after('tanggal_pemakaian_mulai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan_kosta', function (Blueprint $table) {
            // Drop the new date columns
            $table->dropColumn('tanggal_pemakaian_mulai');
            $table->dropColumn('tanggal_pemakaian_selesai');

            // Add the old datetime columns back
            $table->dateTime('waktu_pemakaian_mulai')->after('Users_id');
            $table->dateTime('waktu_pemakaian_selesai')->after('waktu_pemakaian_mulai');
        });
    }
};