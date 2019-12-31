<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //panggil databasenya
use App\Pegawai; // panggil modelnya (pegawai)
use App\jabatan;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $ar_pegawai = DB::table('pegawai')->get();

        $ar_pegawai = DB::table('pegawai')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.idjabatan')
            ->select('pegawai.*', 'jabatan.nama AS posisi')
            ->get();
        return view ('pegawai/index', compact('ar_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.idjabatan')
            ->select('pegawai.*', 'jabatan.nama AS posisi')
            ->where('pegawai.id','=', $id)
            ->get();
        return view ('pegawai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
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
    }
}
