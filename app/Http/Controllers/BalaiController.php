<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BalaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $wilayah = DB::table('wilayah')->find($id);
        $data_rekap = DB::table('wilayah')
            ->join('balai', 'wilayah.id', '=', 'balai.wilayah_id')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->select('wilayah.*', 'balai.*', 'paket.*')
            ->where('wilayah_id', $id)
            ->get();

        //dd($wilayah);
        //dd($data_rekap);

        $airTanah = DB::table('paket')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->where('tblabat_id', '2')
            ->get();
        $airBaku = DB::table('paket')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->where('tblabat_id', '3')
            ->get();
        $perencanaan = DB::table('paket')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->where('tblabat_id', '1')
            ->get();
        $administrasi = DB::table('paket')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->where('tblabat_id', '4')
            ->get();
        return view('balai.dashboard_balai', compact('data_rekap', 'wilayah', 'airTanah', 'airBaku', 'perencanaan', 'administrasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
