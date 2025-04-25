<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesananMakeUp extends Model
{



       // Atribut yang dapat diisi melalui mass assignment
    protected $fillable = [
        'make_ups_id',
        'Users_id',
        'tanggal_pesanan',
        'lokasi_pemesanan',
        'alamat',
        'latitude',
        'longitude',
        'total_harga',
        'status_pesanan',
    ];
    // Relasi ke model MakeUp
    public function makeup(): BelongsTo
    {
        return $this->belongsTo(MakeUp::class, 'makeup_id'); // Pastikan makeup_id adalah foreign key yang benar
    }

    // Relasi ke model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // Pastikan user_id adalah foreign key yang benar
    }

}