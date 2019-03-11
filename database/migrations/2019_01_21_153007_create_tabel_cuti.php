<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('masa_kerja');
            $table->string('jenis_cuti');
            $table->string('alasan_cuti');
            $table->string('status')->default('tunggu konfirmasi');
            $table->date('tanggal_cuti');
            $table->date('tanggal_selesai');
            $table->string('keterangan')->nullable();
            $table->text('foto_cuti')->nullable();
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
        Schema::dropIfExists('tabel_cuti');
    }
}
