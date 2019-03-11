<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResources(['user' =>  'API\UserController']);
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@Updateprofile');
Route::get('findUser', 'API\UserController@search');
Route::get('countall', 'API\UserController@count');


Route::apiResources(['pegawai' =>  'API\PegawaiController']);
Route::get('cekdata', 'API\PegawaiController@cekdata');
Route::put('reset/{id}', 'API\PegawaiController@resetkuota');
Route::get('findPegawai', 'API\PegawaiController@caripegawai');
Route::get('tes', 'API\PegawaiController@tes');
Route::get('findKuota', 'API\PegawaiController@search');



Route::apiResources(['cuti' =>  'API\CutiController']);
Route::get('datailcuti', 'API\CutiController@detailcuti');
Route::put('terima', 'API\CutiController@updatestatus');
Route::put('batal', 'API\CutiController@batalcuti');


Route::apiResources(['dinas' =>  'API\DinasController']);
Route::get('view', 'API\DinasController@viewall');


Route::apiResources(['detail' =>  'API\DetailPegawaiController']);
Route::post('import', 'API\DetailPegawaiController@importExcel');
Route::get('findPegawai', 'API\DetailPegawaiController@search');

