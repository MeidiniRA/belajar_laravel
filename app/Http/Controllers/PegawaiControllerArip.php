<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request){
    	if ($request->has('cari')) {
    		$data_pegawai = \App\Pegawai::where('nama_depan', 'LIKE', '%' .$request->cari.'%')->get();
    	} else {

    	//untuk memanggil data pegawai di dalam model
    	$data_pegawai = \App\Pegawai::all();

    }
    	return view ('pegawai.index',
    		['data_pegawai' => $data_pegawai]);
    }
    // untuk membuat create data pada tabel pegawai
    public function create(Request $request){
    	\App\Pegawai::create($request->all());
    	return redirect ('/pegawai');
    }
    // untuk membuat edit data pada tabel pegawai
    public function edit($id){
    	$pegawai = \App\Pegawai::find($id);
    	return view('pegawai/edit',['pegawai'=> $pegawai]);

    }
    public function update(Request $request, $id){
    	$pegawai = \App\Pegawai::find($id);
    	$pegawai->update($request->all());
    	return redirect('pegawai/');

    }
    public function delete($id){
    	$pegawai = \App\Pegawai::find($id);
    	$pegawai->delete($pegawai);
    	return redirect('/pegawai');

    }
}
