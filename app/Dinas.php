<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    protected $table = "dinas";


    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','id_user','id_user');
    }
    public function users()
    {
        return $this->belongsTo('App\User','id_user','id');


    }

    protected $fillable = ['id','id_user','t_m_p_dinas',
        'maksud_perjalanan','alat_transportasi','tempat_berangkat'
    ,'tempat_tujuan','l_p_dinas','tanggal_berangkat','tanggal_kembali'
    ,'d_d'];

}
