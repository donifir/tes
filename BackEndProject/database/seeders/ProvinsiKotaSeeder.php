<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Provinsi::create([
            'nama_daerah'=>'Jawa Timur',
            'keterangan'=>'jawa timur memiliki ....',
        ]);

        Provinsi::create([
            'nama_daerah'=>'Jawa Barat',
            'keterangan'=>'jawa barat memiliki ....',
        ]);

        KabupatenKota::create([
            'provinsi_id'=>'1',
            'nama_daerah'=>'Kabupaten Jember',
            'keterangan'=>'Kabupaten Jember memiliki ....'
        ]);
        KabupatenKota::create([
            'provinsi_id'=>'1',
            'nama_daerah'=>'Kabupaten Malang',
            'keterangan'=>'Kabupaten Malang memiliki ....'
        ]);
        KabupatenKota::create([
            'provinsi_id'=>'1',
            'nama_daerah'=>'Kota Malang',
            'keterangan'=>'Kota Malang memiliki ....'
        ]);

        KabupatenKota::create([
            'provinsi_id'=>'2',
            'nama_daerah'=>'Kabupaten Bandung',
            'keterangan'=>'Kabupaten Bandung memiliki ....'
        ]);
        KabupatenKota::create([
            'provinsi_id'=>'1',
            'nama_daerah'=>'Kota Bandung',
            'keterangan'=>'Kota Bandung memiliki ....'
        ]);
    }
}
