<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{
    public function index()
    {
        $employee = DB::table('employee')->get();
        $absensi = DB::table('absensi')
            ->join('employee','employee.nik','=','absensi.nik')
            ->select('*')
            ->get();
        return view('absensi.show_absensi', ['absensi' => $absensi, 'employee' => $employee]);
    }

    function create(Request $request)
    {
        $nik=$request->input('nik');
        $jam_masuk=$request->input('jam_masuk');
        $jam_keluar=$request->input('jam_keluar');
        $tanggal=$request->input('tanggal');

        $absensi = DB::table('absensi')->insert(
            ['nik' => $nik,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'tanggal' => $tanggal ]
        );

        if($absensi){
            return redirect('/absensi')->with('status', 'Data Absensi Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    }
}
