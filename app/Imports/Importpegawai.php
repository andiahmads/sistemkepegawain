<?php

namespace App\Imports;
use App\Detailpegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class Importpegawai implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Detailpegawai([
            'nama_lengkap' => $row[1],
            'status_pegawai' => $row[2],
            'gelar_depan' => $row[3],
            'gelar_belakang' => $row[4],
            'nip' => $row[5],
            'jenis_kelamin' => $row[6],
            'tempat_lahir' => $row[7],
            'tanggal_lahir' => $row[8],
            'p_g_r' => $row[9],
            'npwp' => $row[10],
            'jabatan' => $row[11],
            'm_p_s' => $row[12],
            'tempat_tugas' => $row[13],
            'unit_kerja' => $row[14],
            'alamat_kantor' => $row[15],
            'provinsi' => $row[16],
            'pendidikan_terakhir' => $row[17],
            'no_hp' => $row[18],
            'email' => $row[19],

        ]);
    }
}
