<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{

    protected $table = "t_pegawai";



    protected $fillable = [
        'id', 'id_user', 'status_pegawai','gelar_depan','gelar_belakang','nip',
        'jenis_kelamin','tempat_lahir','tanggal_lahir','p_g_r','npwp','jabatan','m_p_s',
        'unit_kerja','alamat_kantor','provinsi','pendidikan_terakhir','no_hp'
    ];


    public function users()
    {
        return $this->hasMany('App\User','id','id_user');
    }


}