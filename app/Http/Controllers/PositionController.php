<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    public function index()
    {
        $position = DB::table('position')->get();

        return view('position.show_position', ['position' => $position]);
    }

    public function create(Request $request)
    {
        $position_name = $request->input('position_name');
        $position_code = Str::upper(Str::substr($position_name, 0, 2))."-".date('y-m-d')."-".Str::upper(Str::random(2));

        $position = DB::table('position')->insert(
            ['position_code' => $position_code,
            'position_name' => $position_name]
        );

        if($position){
            return redirect('/position')->with('status', 'Data Jabatan Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    } 

    function delete($position_id){
        $position=DB::table('position')->where('position_id', '=', $position_id)-> delete();

        if ($position){
            return redirect('/position')->with('status', 'Berhasil Hapus Jabatan');
        }
        else{
            return redirect('/position')->with('status', 'Gagal Hapus Jabatan');
        }
    }

    function edit($position_id){
        $position=DB::table('position')->where('position_id', '=', $position_id)-> first();

        return view('/position.edit_position',['position'=>$position]);
    }

    function update(Request $request){
        $nama = $request->input('nama');
        $id = $request->input('id');

        $position = DB::table('position')
            ->where('position_id', $id)
            ->update(['position_name'=>$nama]);

        if($position){
            return redirect('/position')->with('status', 'Berhasil Update Jabatan');
        }
        else{
            return redirect('/position')->with('status', 'Gagal Update Jabatan');
        }
    }
}
