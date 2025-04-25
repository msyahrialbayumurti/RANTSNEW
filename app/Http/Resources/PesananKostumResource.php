<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PesananKostumResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_kostum' => $this->nama_kostum,
            'ukuran' => $this->ukuran,
            'jumlah' => $this->jumlah,
            'status_pesanan' => $this->status_pesanan,
            'total_harga' => $this->total_harga,
            'waktu_pemakaian_mulai' => $this->waktu_pemakaian_mulai,
            'waktu_pemakaian_selesai' => $this->waktu_pemakaian_selesai,
        ];
    }
}