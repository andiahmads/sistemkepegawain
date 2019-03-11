<?php

namespace App\Http\Controllers\API;

use App\Cuti;
use App\Pegawai;
    use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Return_;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  auth('api')->user();
        return Cuti::where('id_user','=',$user->id)->get();
    }

    public function detailcuti()
    {

        $proses =Cuti::where("status",'sedang proses')->with('pegawai','users')->get();
        $terima =Cuti::where("status",'diterima')->with('pegawai','users')->get();
        $tolak =Cuti::where("status",'ditolak')->with('pegawai','users')->get();
        $reset = Pegawai::latest()->with('users')->get();


        return[
            'proses' => $proses,
            'terima' => $terima,
            'tolak' => $tolak,
            'reset' => $reset
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
       if($request['jenis_cuti'] === 'cuti sakit') {
           $this->validate($request, [
               'alasan_cuti' => 'required|string|max:191|min:5',
               'masa_kerja' => 'required|string|max:191|min:5',
               'foto_cuti' => 'required',

           ]);
       } else{
           $this->validate($request, [
               'alasan_cuti' => 'required|string|max:191|min:5',
               'masa_kerja' => 'required|string|max:191|min:5',

           ]);
       }


        $user = auth('api')->user();

        $name='';
        if ($request['jenis_cuti'] == 'cuti sakit') {
            $name = time() . '.' . explode('/', explode(':', substr($request->foto_cuti, 0, strpos
                ($request->foto_cuti, ';')))[1])[1];

            \Image::make($request->foto_cuti)->save(public_path('img/bukticuti/') . $name);

            $request->merge(['photo' => $name]);
        }

        //update  kuota cuti
        if ($request['jenis_cuti'] == 'cuti tahunan') {

            $pegawai = Pegawai::where('id_user', '=', $user->id)->first();
            $kuota = $pegawai->k_c_tahunan;
            $hasil = $kuota - $request['jml'];

            $pegawai->k_c_tahunan = $hasil;
            $pegawai->save();
        }

        return Cuti::create([
           'id' => $request['id'],

            'id_user' => $user->id,
            'masa_kerja' => $request['masa_kerja'],
            'jenis_cuti' => $request['jenis_cuti'],
            'alasan_cuti' => $request['alasan_cuti'],
            'status' => 'sedang proses',
            'tanggal_cuti' => $request['tanggal_cuti'],
            'tanggal_selesai' => $request['tanggal_selesai'],
            'keterangan' => $request['keterangan'],
            'foto_cuti' => $name

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request['jenis_cuti'] === 'cuti sakit') {
            $this->validate($request, [
                'alasan_cuti' => 'required|string|max:191|min:5',
                'masa_kerja' => 'required|string|max:191|min:5',
                'foto_cuti' => 'required',

            ]);
        } else{
            $this->validate($request, [
                'alasan_cuti' => 'required|string|max:191|min:5',
                'masa_kerja' => 'required|string|max:191|min:5',

            ]);
        }
        $user = auth('api')->user();

        $pegawai = Pegawai::where('id_user', '=', $user->id)->first();
        $kuota = $pegawai->k_c_tahunan;
        $update = $kuota + $request['jml_awal'] - $request['jml'];
        if ($request['jenis_cuti'] == 'cuti tahunan') {
            $pegawai->k_c_tahunan = $update;
            $pegawai->save();

        }

        $data = Cuti::findOrfail($id);
        $data->update($request->all());


    }

    public function updatestatus(Request $request)
    {

        if($request['status'] == 'ditolak'){
            if($request['jenis_cuti'] == 'cuti tahunan') {
                $pegawai = Pegawai::where('id_user', '=', $request['iduser'])->first();
                $kuota = $pegawai->k_c_tahunan;
                $reset = $kuota + $request['jml'];
                $pegawai->k_c_tahunan = $reset;
                $pegawai->save();

            }
        }


        $data =  Cuti::findOrFail($request['id']);
        $data->status = $request['status'];
        $data->keterangan = $request['keterangan'];
        $data->save();

    }

    public function batalcuti(Request $request)
    {

            $user = auth('api')->user();

                if ($request['jenis_cuti'] == 'cuti tahunan') {
                    $pegawai = Pegawai::where('id_user', '=', $user->id)->first();

                    $kuota = $pegawai->k_c_tahunan;
                    $batal = $kuota + $request['jml'];
                    $pegawai->k_c_tahunan = $batal;
                    $pegawai->save();

                }



        $data =  Cuti::findOrFail($request['id']);
        $data->delete();

    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);

        $cuti->delete();

    }
}
