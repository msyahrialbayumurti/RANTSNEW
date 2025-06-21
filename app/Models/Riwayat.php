<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pesanan_id',
        'jenis_pesanan',
        'status',
    ];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
