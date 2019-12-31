<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //return view('/layouts/index');
    return view('/layouts/home');
});

Route::get('/home', function () {
	 return view('/layouts/home');
});
Route::get('/about', function () {
	 return view('/layouts/about');
});
/*
//ini untuk routing langkah awal untuk mengoneksikan web dengan controller
Route::get('/pegawai', 'PegawaiController@index' );
Route::get('/coba', 'PegawaiController@coba' );

// ini untuk create
Route::post('/pegawai/create', 'PegawaiController@create');
//ini untuk edit data
Route::get('/pegawai/{id}/edit', 'PegawaiController@edit');
Route::post('/pegawai/{id}/update', 'PegawaiController@update');
Route::get('/pegawai/{id}/delete', 'PegawaiController@delete');
*/

Route::resource('jabatan', 'JabatanController');
Route::resource('pegawai', 'PegawaiController');

Route::get('/clear-cache', function(){
	Artisan::call('cache:clear');
	return "Cache is Cleared";
});