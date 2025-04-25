<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // Relasi polymorphic dengan tipe produk (MakeUp, Kostum, PenyewaanJasaTari)
    public function pesananable()
    {
        return $this->morphTo();
    }

    // Relasi khusus jika diperlukan
    public function pesananMakeUp()
    {
        return $this->belongsTo(MakeUp::class, 'produk_id')->where('produk_tipe', 'makeup');
    }

    public function pesananKostum()
    {
        return $this->belongsTo(Kostum::class, 'produk_id')->where('produk_tipe', 'kostum');
    }

    public function pesananTarian()
    {
        return $this->belongsTo(PenyewaanJasaTari::class, 'produk_id')->where('produk_tipe', 'jasa_tari');
    }
}