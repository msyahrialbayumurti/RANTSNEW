<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kostum',
        'image',
        'jumlah',
        'warna',
        'ukuran',
        'harga',
    ];
}
