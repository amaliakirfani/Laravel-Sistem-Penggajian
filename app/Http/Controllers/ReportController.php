<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

use PDF;

class ReportController extends Controller
{

    function index(){
        $employee =DB::table('report_salary')->get();
        $report_salary = DB::table('report_salary')->select('date')-> distinct()->get();

        return view('report.show_report', ['report_salary' => $report_salary, 'employee' => $employee/*, 'position' => $position, 'division' => $division, 'salary' => $salary*/]);
            //var_dump ($report_salary);
    }

    function salary_print(Request $request)
    {
        // $employee=$request->input('employee_name');
        // $division=$request->input('division_code');
        // $position=$request->input('position_code');
        // $report_salary=$request->input('total_salary');
        $nik=$request->input('nik');
        $date=$request->input('date');

        // $report_salary= DB::table('report_salary')->where([
        //     ['nik', '=', $employee],
        //     ['employee_name', '=', $employee],
        //     ['division_code', '=', $division],
        //     ['position_code', '=', $position],
        //     ['date', '=', $report_salary],
        //     ['total_salary', '=', $report_salary],
        // ])->first();

        $report_salary = DB::select("SELECT report_salary.nik as nik, sum(report_salary.total_salary) as total_salary,
        employee.employee_name as employee_name, division.division_name as division_name, position.position_name as position_name
        FROM report_salary
        join employee on report_salary.nik=employee.nik
        join division on division.division_code=employee.division_code
        join position on position.position_code=employee.position_code
        where report_salary.nik='$nik' and date='$date'
        group by report_salary.nik, employee.employee_name,
        division.division_name, position.position_name");


        $pdf=PDF::loadView('report.report_print',['report_salary'=>$report_salary[0]]);
        // return $report_salary->nik;
        return $pdf->download();
        //return view ('report.report_print',['report_salary'=>$report_salary[0]]);

    }
}

// NAMA
// NIK
// DIvisi
// Jabatan
// Total GAJI
// Tanggal