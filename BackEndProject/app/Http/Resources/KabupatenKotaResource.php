<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KabupatenKotaResource extends JsonResource
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
            'provinsi_id' => $this->provinsi->id,
            'nama_provinsi' => $this->provinsi->nama_daerah,
            'keterangan_provinsi' => $this->provinsi->keterangan,
            'nama_kabupaten_kota' => $this->nama_daerah,
            'keterangan_kabupaten_kota' => $this->keterangan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'key' => $this->id,
            'value' => $this->nama_daerah,
        ];
    }
}
