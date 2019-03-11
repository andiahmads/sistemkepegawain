<?php

namespace App\Http\Controllers\API;
use App\User;
use App\Cuti;
use App\Pegawai;
use App\Dinas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  auth('api')->user();

        return Dinas::where('id_user','=',$user->id)->get();



    }
    public function viewall()
    {
        $all = Dinas::latest()->with('pegawai','users')->get();
        return[
            'all' => $all
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
            $this->validate($request, [
                't_m_p_dinas' => 'required|string|max:191|min:5',
                'maksud_perjalanan' => 'required|string|max:191|min:5',
                'alat_transportasi' => 'required|string|max:191|min:5',
                'tempat_berangkat' => 'required|string|max:191|min:5',
                'tempat_tujuan' => 'required|string|max:191|min:5',
                'makasud_perjalanan' => 'required|string|max:191|min:5',
                'd_d' => 'required|string|max:191|min:5',

                'foto_cuti' => 'required',

            ]);

        $user = auth('api')->user();
        return Dinas::create([

            'id' => $request['id'],
            'id_user' =>$user->id,
            't_m_p_dinas' =>$request['t_m_p_dinas'],
            'maksud_perjalanan' =>$request['maksud_perjalanan'],
            'alat_transportasi' =>$request['alat_transportasi'],
            'tempat_berangkat' =>$request['tempat_berangkat'],
            'tempat_tujuan' =>$request['tempat_tujuan'],
            'l_p_dinas' =>$request['jml'],
            'tanggal_berangkat' =>$request['tanggal_berangkat'],
            'tanggal_kembali' =>$request['tanggal_kembali'],
            'd_d' =>$request['d_d'],

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
        return Dinas::where('id', '=', $id)->with('pegawai','users')->get();
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
        $dinas = Dinas::findOrFail($id);

        $dinas->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Dinas::findorFail($id);

        $user->delete();

        return['message' => 'User Delete'];
    }
}
