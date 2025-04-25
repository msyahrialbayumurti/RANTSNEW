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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Nama user
            $table->string('email')->unique(); // Email harus unik
            $table->string('nohp')->nullable(); // Nomor HP bisa kosong (nullable)
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email
            $table->string('password'); // Password user
            $table->string('image')->default('default.png'); // Kolom image dengan nilai default
            $table->rememberToken(); // Token untuk remember me
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary Key email
            $table->string('token'); // Token reset password
            $table->timestamp('created_at')->nullable(); // Waktu token dibuat
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID sesi sebagai Primary Key
            $table->foreignId('user_id')->nullable()->index(); // ID user (Foreign Key)
            $table->string('ip_address', 45)->nullable(); // Alamat IP pengguna
            $table->text('user_agent')->nullable(); // Informasi user agent
            $table->longText('payload'); // Payload sesi
            $table->integer('last_activity')->index(); // Aktivitas terakhir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};