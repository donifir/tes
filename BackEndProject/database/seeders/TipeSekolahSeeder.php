<?php

namespace Database\Seeders;

use App\Models\TipeSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipeSekolah::create([
            'tipe_sekolah'=>'Negerti',
            'keterangan' => ' sekolah negeri'
        ]);

        TipeSekolah::create([
            'tipe_sekolah'=>'Swasta',
            'keterangan' => ' sekolah swasta'
        ]);
    }
}
