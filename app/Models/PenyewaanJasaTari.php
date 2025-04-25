<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanJasaTari extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_penari',
        'jenis_tarian',
        'image',
        'deskripsi_acara',
        'harga',
    ];
}