<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Detailpegawai extends Model
{
    protected $table = 'detailpegawai';
    protected $fillable = ['id','nama_lengkap','status_pegawai','gelar_depan',
        'gelar_belakang','nip','jenis_kelamin','tempat_lahir','tanggal_lahir',
        'p_g_r','npwp','jabatan','m_p_s','tempat_tugas','unit_kerja','alamat_kantor',
        'provinsi','pendidikan_terakhir','no_hp','email'];



}
