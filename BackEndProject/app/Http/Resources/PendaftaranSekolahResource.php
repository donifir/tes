<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranSekolahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // 
        return [
            'id' => $this->id,
            'tipe_sekolah_id'=>$this->tipe_sekolah_id,
            'tipe_sekolah'=>$this->tipesekolah->tipe_sekolah,
            'nama_sekolah'=>$this->nama_sekolah,
            'alamat'=>$this->alamat,
            'kode_pos'=>$this->kode_pos,
            'no_telp'=>$this->no_telp,
            'provinsi_id'=>$this->Provinsi->id,
            'nama_provinsi'=>$this->Provinsi->nama_daerah,
            'kabupatenkota_id'=>$this->kabupatenkota_id,
            'kabupatenkota'=>$this->kabupatenkota->nama_daerah,
            'email_sekolah'=>$this->email_sekolah,
            'facebook'=>$this->facebook,
            'jumlah_siswa'=>$this->jumlah_siswa,
            'foto_sekolah'=>$this->foto_sekolah,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
