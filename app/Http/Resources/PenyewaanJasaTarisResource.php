<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenyewaanJasaTarisResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_jasa_taris' => $this->nama_jasa_taris,
            // Tambahkan field lainnya sesuai dengan kebutuhan
        ];
    }
}