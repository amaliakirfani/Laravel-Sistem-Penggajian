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
        $division=$request->input('division_code');
        $position=$request->input('position_code');
        $employee_name=$request->input('employee_name');
        
        
        $salary= DB::table('salary')->where([
            ['division_code', '=', $division],
            ['position_code', '=', $position],
        ])->first();

        if (empty($salary)){
            return redirect('/employee')->with('status', 'Data Salary Belum Ada Silahkan Isi Dulu');
        }

        $employee = DB::table('employee')
        ->orderBy('nik', 'desc')
        ->limit(1)
        ->first(); // $employee->nik = 3

        if (empty($employee)){
            $nik='1';
        }else{
            $nik=$employee->nik+1;
        }
          
        $employee = DB::table('employee') -> insert(
            ['nik'=>(string)$nik,
            'employee_name'=>$employee_name,
            'division_code' => $division,
            'position_code' => $position,
            'salary_code' => $salary->salary_code,
            ]
        );
            
       if($employee){
            return redirect('/employee')->with('status', 'Data Karyawan Berhasil Ditambah');
        }
        else{
            print('input gagal');
        }
    }

    function delete($employee_id){
        $employee=DB::table('employee')->where('employee_id', '=', $employee_id)-> delete();

        if ($employee){
            return redirect('/employee')->with('status', 'Berhasil Hapus Data Karyawan');
        }
        else{
            return redirect('/employee')->with('status', 'Gagal Hapus Data Karyawan');
        }
    }

    function edit($employee_id){
        $employee=DB::table('employee')->where('employee_id', '=', $employee_id)-> first();

        return view('/employee.edit_employee',['employee'=>$employee]);
    }

    function update(Request $request){
        $employee = $request->input('employee'); //untuk edit
        $id = $request->input('id');

        $employee = DB::table('employee')
            ->where('employee_id', $id)
            ->update(['employee'=>$employee]);

        if($employee){
            return redirect('/employee')->with('status', 'Berhasil Update Data Karyawan');
        }
        else{
            return redirect('/employee')->with('status', 'Gagal Update Data Karyawan');
        }
    }
}
