<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DivisionController extends Controller
{
    public function index()
    {
        $division = DB::table('division')->get();

        return view('division.show_division', ['division' => $division]);
    }

    public function create(Request $request)
    {
        $code = $request -> input('code');
        $nama = $request -> input('nama');

        $division = DB::table('division')->insert(
            ['division_code' => $code,
            'division_name' => $nama]
        );

        if($division){
            return redirect('/division')->with('status','Data Divisi Berhasil Ditambah');
        }else
        {
            print('input gagal');
        }

        function delete($division_id){
            $division=DB::table('division')->where('division_id','=',$division_id)-> delete();
        
            if($division){
                return redirect('/division')->with('status','Berhasil Hapus Divisi');
            }else
            {
                return redirect('/division')->with('status','Gagal Hapus Divisi');
            }
        }

        function edit($division_id){
            $division=DB::table('division')->where('division_id','=',$division_id)-> first();

            return view('/division.edit_division',['division'=>$division]);
        }

        function update(Request $request){
            $code = $request->input('code');
            $nama = $request->input('nama');
            $id = $request->input('id');
    
            $division = DB::table('division')
                ->where('division_id', $id)
                ->update(['division_code' => $code, 'division_name'=>$nama]);
    
            if($division){
                return redirect('/division')->with('status', 'Berhasil Update Divisi');
            }
            else{
                return redirect('/division')->with('status', 'Gagal Update Divisi');
            }
        }
    }
}