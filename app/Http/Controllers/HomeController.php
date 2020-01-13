<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wilayah = DB::table('wilayah')->get();
        $balai = DB::table('balai')->get();
        $satker = DB::table('satker')->get();
        $paket = DB::table('paket')->get();
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
        return view('home', compact('wilayah', 'balai', 'satker', 'paket', 'airTanah', 'airBaku', 'perencanaan', 'administrasi'));
    }
}
