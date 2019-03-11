<?php

namespace App\Http\Controllers\API;
use App\Detailpegawai;
use App\Imports\Importrequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;

class DetailPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detailpegawai::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_lengkap'  => 'required|string',
            'status_pegawai'  => 'required|string',
            'nip'  => 'required|string|min:18|max:18',
            'tempat_lahir'  => 'required|string',
            'npwp'  => 'required|string|min:15|max:15',
            'jabatan'  => 'required|string',
            'unit_kerja'  => 'required|string',
            'alamat_kantor'  => 'required|string',
            'provinsi'  => 'required|string',
            'no_hp'  => 'required|string|min:12|max:12',
            'email' => 'required|string|email|max:191|unique:detailpegawai',





        ]);


        return Detailpegawai::create([
            'id' => $request['id'],
            'nama_lengkap' => $request['nama_lengkap'],
            'status_pegawai' =>$request['status_pegawai'],
            'gelar_depan' =>$request['gelar_depan'],
            'gelar_belakang' =>$request['gelar_belakang'],
            'nip' =>$request['nip'],
            'jenis_kelamin' =>$request['jenis_kelamin'],
            'tempat_lahir' =>$request['tempat_lahir'],
            'tanggal_lahir' =>$request['tanggal_lahir'],
            'p_g_r' =>$request['p_g_r'],
            'npwp' =>$request['npwp'],
            'jabatan' =>$request['jabatan'],
            'm_p_s' =>$request['m_p_s'],
            'tempat_tugas' =>$request['tempat_tugas'],
            'unit_kerja' =>$request['unit_kerja'],
            'alamat_kantor' =>$request['alamat_kantor'],
            'provinsi' =>$request['provinsi'],
            'pendidikan_terakhir' =>$request['pendidikan_terakhir'],
            'no_hp' =>$request['no_hp'],
            'email' =>$request['email'],

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $this->validate($request,[
            'nama_lengkap'  => 'required|string',
            'status_pegawai'  => 'required|string',
            'nip'  => 'required|string|min:18|max:18',
            'tempat_lahir'  => 'required|string',
            'npwp'  => 'required|string|min:15|max:15',
            'jabatan'  => 'required|string',
            'unit_kerja'  => 'required|string',
            'alamat_kantor'  => 'required|string',
            'provinsi'  => 'required|string',
            'no_hp'  => 'required|string|min:12|max:12',
            'email' => 'required|string|email|max:191|unique:detailpegawai',


        ]);


        $pegawai = Detailpegawai::findOrFail($id);
        $pegawai->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Detailpegawai::findOrFail($id);
        $request->delete();

    }
    public function search(){
        if ($search = \Request::get('q')) {
            $pegawai = DetailPegawai::where(function($query) use ($search){
                $query->where('nama_lengkap','LIKE',"%$search%")
                    ->orWhere('nip','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $pegawai = User::latest()->paginate(5);
        }
        return $pegawai;
    }






}
