<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Pegawai;
use App\Jabatan;
use Validator,Redirect,Response,File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
            //array scalar tanpa join
         // $ar_pegawai = Pegawai::orderBy('nama')->get();
         // $ar_pegawai = DB::table('pegawai')->get();

        //pake Join Table
         $ar_pegawai = DB::table('pegawai')
         ->join('jabatan','jabatan.id','=','pegawai.idjabatan')
         ->select('pegawai.*', 'jabatan.nama AS posisi')
         ->get();


         // Code konvensional query join table sebelum jadi defaultnya laravel seperti code diatas :
         // $ar_pegawai = "select pegawai.*, jabatan.nama AS posisi 
         //                from pegawai inner join jabatan on jabatan.id = pegawai.idjabatan";

        return view('pegawai/index', compact('ar_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //arahkan ke form input data baru
        return view('pegawai/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'hp'=>'required|unique:pegawai|max:15',
            'hp'=>'numeric',
            'nama'=>'required|max:50',
            'gender'=>'required',
            //'email'=>'email|max:45',
            'idjabatan'=>'required|numeric',
            'jumlah_anak'=>'numeric',
        ], 

        [
            'hp.required' => 'HP Wajib Diisi',
            'nama.required' => 'Nama Wajib Diisi',
            'gender.required' => 'Jenis Kelamin Wajib Diisi',
            'idjabatan.required' => 'Id Jabatan Wajib Diisi',
            'jumlah_anak.numeric' => 'Harus Berupa Angka'
        ]);


        //tangkap request element2 form
        //lalu panggil fungsi insert
        DB::table('pegawai')->insert(
            [
                'nama'=>$request->nama,
                'gender'=>$request->jk,
                'idjabatan'=>$request->jabatan,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'jumlah_anak'=>$request->jumlah,
                'foto'=>$request->foto,
                'status'=>$request->status
                
            ]);

        //Landing page
        return redirect('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = DB::table('pegawai')
         ->join('jabatan','jabatan.id','=','pegawai.idjabatan')
         ->select('pegawai.*', 'jabatan.nama AS posisi')
         ->where('pegawai.id','=', $id)
         ->get();

         return view('pegawai.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //tampilkan form untuk menampilkan
        //data lama yang mau diedit sebanyak satu baris data
        $data = Pegawai::where('id',$id)->get();
        return view('pegawai.update', compact('data'));
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
         DB::table('pegawai')->where('id', $id)->update(
            [
                'nama'=>$request->nama,
                'gender'=>$request->jk,
                'idjabatan'=>$request->jabatan,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'jumlah_anak'=>$request->jumlah,
                'foto'=>$request->foto,
                'status'=>$request->status
                
            ]);

        //Landing page ke url http://localhost:8000/pegawai/id
        return redirect('/pegawai'.'/'.$id);
    }

    public function destroy($id)
    {
        DB::table('pegawai')->where('id',$id)->delete();
        return redirect('/pegawai');
    }
}
