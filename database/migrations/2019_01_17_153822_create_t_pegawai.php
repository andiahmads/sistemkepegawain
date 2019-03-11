<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->bigInteger('nip');
            $table->string('status_pegawai');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('p_g_r');
            $table->bigInteger('npwp');
            $table->string('jabatan');
            $table->string('m_p_s')->nullable();
            $table->string('unit_kerja');
            $table->string('alamat_kantor');
            $table->string('provinsi');
            $table->string('pendidikan_terakhir');
            $table->string('no_hp');
            $table->integer('k_c_tahunan')->default("15");

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
        Schema::dropIfExists('t_pegawai');
    }
}
