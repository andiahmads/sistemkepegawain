<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelDetailpegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('status_pegawai');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->bigInteger('nip');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('p_g_r');
            $table->integer('npwp');
            $table->string('jabatan');
            $table->string('m_p_s')->nullable();
            $table->string('tempat_tugas');
            $table->string('unit_kerja');
            $table->string('alamat_kantor');
            $table->string('provinsi');
            $table->string('pendidikan_terakhir');
            $table->bigInteger('no_hp');
            $table->string('email');
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
        Schema::dropIfExists('tabel_detailpegawai');
    }
}
