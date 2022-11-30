<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipeSekolahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tipe_sekolah' => $this->tipe_sekolah,
            'keterangan' => $this->keterangan,
            'key' => $this->id,
            'value' => $this->tipe_sekolah,
        ];
    }
}
