<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesananKostum extends Model
{
// In PesananProduk model

   // Atribut yang dapat diisi melalui mass assignment
    protected $fillable = [
    'kosta_id',
    'Users_id',
    'tanggal_pemakaian_mulai',
    'tanggal_pemakaian_selesai',
    'total_harga',
    'status_pesanan',
];

public function kosta()
{
    return $this->belongsTo(PesananKostum::class, 'kosta_id'); // Ensure kosta_id is the foreign key
}

public function user()
{
    return $this->belongsTo(User::class, 'Users_id'); // Ensure Users_id is the foreign key
}

}