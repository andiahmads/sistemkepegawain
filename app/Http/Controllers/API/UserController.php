<?php

namespace App\Http\Controllers\API;

use App\Pegawai;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cuti;
use App\Dinas;

use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }



    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isPimpinan')){
            return User::latest()->paginate(5);
        }

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
            'name'   => 'required|string|max:191|min:5',
            'email' => 'required|string|email|max:191|unique:users',
            'password'  => 'required|string|min:6'

        ]);
            return User::create([

                'id' => $request['id'],
               'name' => $request['name'],
                'email' => $request['email'],
                'type' => $request['type'],
                'bio' => $request['bio'],
                'photo' => 'profile.png',
                'password' => Hash::make($request['password']),

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


    public function profile()
    {
        return auth('api')->user();

    }


    public function updateProfile(Request $request )

    {


        $user =  auth('api')->user();

        $this->validate($request,[
            'name'   => 'required|string|max:191|min:5',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password'  => 'sometimes|required|min:6'

        ]);


        $currentPhoto = $user->photo;

        if($request->photo !=$currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
                ($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;

            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }


        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }


        $user->update($request->all());



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

        $user = User::findOrFail($id);

        $this->validate($request,[
            'name'   => 'required|string|max:191|min:5',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password'  => 'sometimes|min:6'


        ]);

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//

        $user = User::findorFail($id);

        $user->delete();

        return['message' => 'User Delete'];
    }


    public function search(){
        if ($search = \Request::get('q')) {
            $users = User::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%")
                    ->orWhere('type','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users = User::latest()->paginate(5);
        }
        return $users;
    }

    public function count()
    {
        $users = auth('api' )->user();
        $user = User::latest()->count();
        $pegawai = Pegawai::latest()->count();
        $cuti = Cuti::latest()->count();
        $dinas = Dinas::latest()->count();
        $proses =Cuti::where("status",'sedang proses')->count();
        $terima =Cuti::where("status",'diterima')->count();
        $tolak =Cuti::where("status",'ditolak')->count();
        $prosesme =Cuti::where([['status', '=', 'sedang proses'],['id_user', '=', $users->id]])->count();
        $terimame =Cuti::where([['status', '=', 'diterima'],['id_user', '=', $users->id]])->count();
        $tolakme =Cuti::where([['status', '=', 'ditolak'],['id_user', '=', $users->id]])->count();
        $dinasme =Dinas::where([['id_user', '=', $users->id]])->count();




//        $terimame =Cuti::where("status",'diterima','=',$user->id)->count();
//        $tolakme =Cuti::where("status",'ditolak','=',$user->id)->count();

        return[

            'countuser' => $user,
            'countpegawai' => $pegawai,
            'countcuti' => $cuti,
            'countdinas' => $dinas,
            'proses' => $proses,
            'terima' => $terima,
           'tolakme' => $tolakme,
            'terimame' => $terimame,
            'prosesme' => $prosesme,
            'dinasme' => $dinasme,
            'tolak' => $tolak,


        ];

    }




}
