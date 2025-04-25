<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MakeUpResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_make_up' => $this->nama_make_up,
            // Tambahkan field lainnya sesuai dengan kebutuhan
        ];
    }
}