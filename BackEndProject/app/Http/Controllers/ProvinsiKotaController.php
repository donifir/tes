<?php

namespace App\Http\Controllers;

use App\Http\Resources\KabupatenKotaResource;
use App\Http\Resources\ProvinsiResource;
use App\Http\Resources\TipeSekolahResource;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\TipeSekolah;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinsiKotaController extends Controller
{

     //
    public function getProvinsi()
    {
        //
        $provinsi=Provinsi::orderBy('nama_daerah')->get();
        $response = [
            'success' => true,
            'message' => 'data api provinsi',
            'data' => ProvinsiResource::collection(($provinsi))
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function getKota()
    {
        //
        $kabupatenkota=KabupatenKota::orderBy('nama_daerah')->get();
        $response = [
            'success' => true,
            'message' => 'data api kabupaten kota',
            'data' => KabupatenKotaResource::collection($kabupatenkota) 
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function getTipe()
    {
        //
        $tipesekolah=TipeSekolah::orderBy('id')->get();
        $response = [
            'success' => true,
            'message' => 'data api kabupaten kota',
            'data' =>  TipeSekolahResource::collection($tipesekolah)
        ];
        return response()->json($response, Response::HTTP_OK);
    }

   
}
