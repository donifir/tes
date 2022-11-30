<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSekolah extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupatenkota()
    {
        return $this->belongsTo(KabupatenKota::class);
    }

    public function TipeSekolah()
    {
        return $this->belongsTo(TipeSekolah::class);
    }
}
