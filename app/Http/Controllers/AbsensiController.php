<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = DB::table('absensi')->get();
        $employee = DB::table('employee')->get();
        return view('absensi.show_absensi', ['absensi' => $absensi, 'employee' => $employee]);
    }

    public function absensi(Request $request)
    {
        $tanggal = date("Y-m-d");
        $jam_masuk = date("H:i:s");
        $jam_keluar= date("H:i:s");
        return $request->all();
       
    }
}
