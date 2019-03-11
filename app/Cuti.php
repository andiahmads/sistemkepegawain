<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{

public function pegawai()
{
    return $this->belongsTo('App\Pegawai','id_user','id_user');
}
public function users()
{
    return $this->belongsTo('App\User','id_user','id');


}




    protected $table = "tabel_cuti";

    protected $fillable = [
        'id','id_user','masa_kerja','jenis_cuti','alasan_cuti','status',
        'tanggal_cuti','tanggal_selesai','keterangan','foto_cuti'

    ];

}
