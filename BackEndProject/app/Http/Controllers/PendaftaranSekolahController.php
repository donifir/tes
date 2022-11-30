<?php

namespace App\Http\Controllers;

use App\Http\Resources\PendaftaranSekolahResource;
use App\Models\PendaftaranSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class PendaftaranSekolahController extends Controller
{
 
    public function index()
    {
        //
        $pendaftaran = PendaftaranSekolah::orderBy('id', 'desc')->get();
        $response = [
            'success' => true,
            'message' => 'data pendaftaran terbaru',
            'data' => PendaftaranSekolahResource::collection($pendaftaran)
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'tipe_sekolah' => ['required'],
            'nama_sekolah' => ['required','max:50'],
            'alamat' => ['required','max:250'],
            'kode_pos' => ['required','max:5'],
            'no_telp' => ['required'],
            'provinsi' => ['required'],
            'kabupatenkota' => ['required'],
            'email_sekolah' => ['required','email'],
            'jumlah_siswa' => ['required','max:100','numeric'],
            // 'foto_sekolah' => ['required'],
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
                'data' => ''
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else {
            // $file = $request->file('foto_sekolah');
            // $imageName = Str::random() . '-' . time() . '.' . $request->foto_sekolah->extension();
            // $file->move(public_path('image'), $imageName);


            $pendaftaran = PendaftaranSekolah::create([
                'tipe_sekolah_id' => $request->tipe_sekolah,
                'nama_sekolah' => $request->nama_sekolah,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'no_telp' => $request->no_telp,
                'provinsi_id' => $request->provinsi,
                'kabupatenkota_id' => $request->kabupatenkota,
                'email_sekolah' => $request->email_sekolah,
                'facebook' => $request->facebook,
                'jumlah_siswa' => $request->jumlah_siswa,
                // 'foto_sekolah' => $imageName,               
            ]);
            $response    = [
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data'    => $pendaftaran,
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }


    public function show($id)
    {
        //
        $data=PendaftaranSekolah::find($id);
        $response = [
            'success' => true,
            'message' => 'data pendaftaran detail',
            'data' =>  new PendaftaranSekolahResource($data)
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
         //
         $data = PendaftaranSekolah::find($id);
         $validator = Validator::make($request->all(), [
            'tipe_sekolah' => ['required'],
            'nama_sekolah' => ['required','max:50'],
            'alamat' => ['required','max:250'],
            'kode_pos' => ['required','max:5'],
            'no_telp' => ['required'],
            'provinsi' => ['required'],
            'kabupatenkota' => ['required'],
            'email_sekolah' => ['required','email'],
            'jumlah_siswa' => ['required','max:100','numeric'],
            // 'foto_sekolah' => ['required'],
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
                'data' => ''
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else {
           
            // $file = $request->file('foto_sekolah');
            // $imageName = Str::random() . '-' . time() . '.' . $request->foto_sekolah->extension();
            // $file->move(public_path('image'), $imageName);

            $data->update([
                'tipe_sekolah_id' => $request->tipe_sekolah,
                'nama_sekolah' => $request->nama_sekolah,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'no_telp' => $request->no_telp,
                'provinsi_id' => $request->provinsi,
                'kabupatenkota_id' => $request->kabupatenkota,
                'email_sekolah' => $request->email_sekolah,
                'facebook' => $request->facebook,
                'jumlah_siswa' => $request->jumlah_siswa,
                // 'foto_sekolah' => $imageName,               
            ]);
            $response    = [
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data'    => $data,
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }

    public function destroy($id)
    {
        //
        $data= PendaftaranSekolah::find($id)->delete();
        $response    = [
            'success' => true,
            'message' => 'Data berhasil dihapus',
            'data'    => null,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
