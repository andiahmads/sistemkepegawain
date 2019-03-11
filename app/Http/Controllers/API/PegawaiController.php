<?php

namespace App\Http\Controllers\API;

use App\Pegawai;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $user = auth('api' )->user();
        $show = Pegawai::where('id_user', '=', $user->id)->first();
        $hitung = Pegawai::where('id_user', '=', $user->id)->count();
        $showall = Pegawai::latest()->with('users')->get();


        return[
            'show' => $show,
            'hitung' => $hitung,
            'showall' => $showall,
            'user' => $user

        ];



    }

    public function tes()

    {
        $user = auth('api' )-> user();

        return[
            'show' => $user,

        ];



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nip'  => 'required|string|min:18|max:18',
            'status_pegawai'  => 'required|string',
            'gelar_belakang'  => 'required|string',
            'jenis_kelamin'  => 'required|string',
            'tempat_lahir'  => 'required|string',
            'tanggal_lahir'  => 'required',
            'npwp'  => 'required|string|min:15|max:15',
            'jabatan'  => 'required|string',
            'm_p_s'  => 'required|string',
            'unit_kerja'  => 'required|string',
            'alamat_kantor'  => 'required|string',
            'provinsi'  => 'required|string',
            'pendidikan_terakhir'  => 'required|string',
            'no_hp'  => 'required|string|min:11|max:13',

        ]);


        $user =  auth('api')->user();
        return Pegawai::create([
            'id' => $request['id'],
            'id_user' => $user->id,
            'nip' => $request['nip'],
            'status_pegawai' => $request['status_pegawai'],
            'gelar_depan' => $request['gelar_depan'],
            'gelar_belakang' => $request['gelar_belakang'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'p_g_r' => $request['p_g_r'],
            'npwp' => $request['npwp'],
            'jabatan' => $request['jabatan'],
            'm_p_s' => $request['m_p_s'],
            'unit_kerja' => $request['unit_kerja'],
            'alamat_kantor' => $request['alamat_kantor'],
            'provinsi' => $request['provinsi'],
            'pendidikan_terakhir' => $request['pendidikan_terakhir'],
            'no_hp' => $request['no_hp']


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
        return Pegawai::where('id', '=', $id)->with('users')->get();
    }

    public function cekdata()
    {
        $user = auth('api')->user();
        $hitung = Pegawai::where('id_user', '=', $user->id)->count();
        $cek = Pegawai::where('id_user', '=', $user->id)->get();
        return [
            'hitung' => $hitung,
            'cek' => $cek
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nip'  => 'required|string|min:18|max:18',
            'status_pegawai'  => 'required|string',
            'gelar_belakang'  => 'required|string',
            'jenis_kelamin'  => 'required|string',
            'tempat_lahir'  => 'required|string',
            'tanggal_lahir'  => 'required',
            'npwp'  => 'required|string|min:15|max:15',
            'jabatan'  => 'required|string',
            'm_p_s'  => 'required|string',
            'unit_kerja'  => 'required|string',
            'alamat_kantor'  => 'required|string',
            'provinsi'  => 'required|string',
            'pendidikan_terakhir'  => 'required|string',
            'no_hp'  => 'required|string|min:12|max:12',

        ]);



        $pegawai =  Pegawai::findOrFail($id);

        $pegawai->update($request->all());

    }

    public function resetkuota(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->k_c_tahunan = $request['k_c_tahunan'];
        $pegawai->save();
    }

    public function caripegawai()
    {
        if ($search = \Request::get('q')) {
            $pegawai = Pegawai::where(function($query) use ($search){
                $query->where('nip','LIKE',"%$search%")
                    ->orWhere('jabatan','LIKE',"%$search%")
                    ->orWhere('status_pegawai','LIKE',"%$search%");
            })->with('users')->get();


        }else{
            $pegawai = Pegawai::latest()->paginate(5);
        }
        return $pegawai;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->delete();
    }


    public function search(){
        if ($search = \Request::get('q')) {
            $users = Pegawai::where(function($query) use ($search){
                $query->where('nip','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%")
                    ->orWhere('type','LIKE',"%$search%");
            })->with('users')->get();

        }else{
            $users = Pegawai::latest()->paginate(5);
        }

        return $users;
    }


}
