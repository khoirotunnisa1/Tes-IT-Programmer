<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes','TesController@index');

 
Route::get('/edittabel', function () {
    return view('editmutasi');
});
Route::get('/datas','DataController@index');
Route::post('/datas/store','DataController@store');
Route::get('/datas/edit/{id}','DataController@edit');
Route::post('/datas/update/{id}','DataController@update');
Route::get('/datas/hapus/{id}','DataController@destroy');
Route::get('/mutasi','MutasiController@index'); 
Route::get('/mutasi/cari','MutasiController@create');
Route::post('/mutasi/store','MutasiController@store');
Route::get('/mutasi/edit/{id}','MutasiController@edit');
Route::post('/mutasi/update/{id}','MutasiController@update');
Route::get('/mutasi/hapus/{id}','MutasiController@destroy');