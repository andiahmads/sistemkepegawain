<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('t_m_p_dinas');
            $table->string('maksud_perjalanan');
            $table->string('alat_transportasi');
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->string('l_p_dinas');
            $table->string('tanggal_berangkat');
            $table->string('tanggal_kembali');
            $table->string('d_d');
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
        Schema::dropIfExists('dinas');
    }
}
