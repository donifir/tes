<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_sekolah_id');
            $table->string('nama_sekolah',50);
            $table->string('alamat',250);
            $table->string('kode_pos',5);
            $table->string('no_telp',15);
            $table->foreignId('provinsi_id');
            $table->foreignId('kabupatenkota_id');
            $table->string('email_sekolah',15);
            $table->string('facebook',15)->nullable();
            $table->integer('jumlah_siswa');
            $table->string('foto_sekolah',105)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_sekolahs');
    }
};
