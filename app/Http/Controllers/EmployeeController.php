<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {   
        $position= DB::table('position')->get();
        $division=DB::table('division')->get();
        $salary = DB::table('salary')->get();
        $employee = DB::table('employee')
            ->join('position','position.position_code','=','employee.position_code')
            ->join('division','division.division_code','=','employee.division_code')
            ->select('*')
            ->get();

        return view('employee.show_employee', ['employee' => $employee, 'position'=>$position, 'division' =>$division, 'salary'=>$salary]);
    }

    function create(Request $request)
    {
        $nik=$request->input('nik');
        $division=$request->input('division_name');
        $position=$request->input('position_name');
        $employee=$request->input('employee_name');
        
        $num = 123;
        $str_length = 1;
        
        $salary= DB::table('salary')->where([
            ['division_name', '=', $division],
            ['position_name', '=', $position],
        ])->first();
        
        $employee = DB::table('employee') -> insert(
            ['nik'=>$nik,
            'employee_name'=>$employee]
        );
                /*->orderBy('nik', 'desc')
                ->limit(10)
                ->first();*/
        $nik=$employee->nik;
        $str = substr("{$num}", -$str_length);
        print ($nik);

       /* if($employee){
            return redirect('/employee')->with('status', 'Data Karyawan Berhasil Ditambah');
        }
        else{
            print('input gagal');
        }*/ 
    }
}
