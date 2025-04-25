<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['user_id', 'pesanan_id', 'message'];

    // Relasi ke model User (pengirim pesan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}