<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SalaryController extends Controller
{
    public function index()
    {
        $position = DB::table('position')->get();
        $division = DB::table('division')->get();
        $salary = DB::table('salary')->get();
        return view('salary.show_salary', ['salary' => $salary, 'division' => $division, 'position' => $position]);
    }

    public function create(Request $request)
    {
        $division = $request->input('division_name');
        $division_code = Str::upper(Str::substr($division, 0, 2));

        var_dump($division);
        $position = $request->input('position_name');
        $position_code = Str::upper(Str::substr($position, 0, 2));

        $salary = $request->input('salary');
        $salary_code = $division_code."-".$position_code."-".date('Y')."-".Str::upper(Str::random(2));

        $salary = DB::table('salary')->insert(
            ['salary_code' => $salary_code,
            'division_code' => $division,
            'position_code' => $position,
            'salary' => $salary]
        );

        if($salary){
            return redirect('/salary')->with('status', 'Data Gaji Berhasil Ditambah');
        }
        else{
            print('input gagal');
        } 
    } 


    function delete($salary_id){
        $salary=DB::table('salary')->where('salary_id', '=', $salary_id)-> delete();

        if ($salary){
            return redirect('/salary')->with('status', 'Berhasil Hapus Jumlah Gaji');
        }
        else{
            return redirect('/salary')->with('status', 'Gagal Hapus Jumlah Gaji');
        }
    }

    function edit($salary_id){
        $salary=DB::table('salary')->where('salary_id', '=', $salary_id)-> first();

        return view('/salary.edit_salary',['salary'=>$salary]);
    }

    function update(Request $request){
        $salary = $request->input('salary');
        $id = $request->input('id');

        $salary = DB::table('salary')
            ->where('salary_id', $id)
            ->update(['salary'=>$salary]);

        if($salary){
            return redirect('/salary')->with('status', 'Berhasil Update Jumlah Gaji');
        }
        else{
            return redirect('/salary')->with('status', 'Gagal Update Jumlah Gaji');
        }
    }

}
