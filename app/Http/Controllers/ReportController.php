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
        /*$position= DB::table('position')->get();
        $division=DB::table('division')->get();
        $salary = DB::table('salary')->get();
        $employee = DB::table('employee')->get();
        $report_salary = DB::table('report_salary')
            ->join('position','position.position_code','=','report_salary.position_code')
            ->join('division','division.division_code','=','report_salary.division_code')
            ->join('employee','employee.nik','=','report_salary.nik')
            ->select('*')
            ->get();*/

        return view('report.show_report', ['report_salary' => $report_salary, 'employee' => $employee/*, 'position' => $position, 'division' => $division, 'salary' => $salary*/]);
            //var_dump ($report_salary);
    }

    function salary_print(Request $request)
    {
        $employee=$request->input('employee_name');
        $division=$request->input('division_code');
        $position=$request->input('position_code');
        $report_salary=$request->input('total_salary');

        $report_salary= DB::table('report_salary')->where([
            ['nik', '=', $employee],
            ['employee_name', '=', $employee],
            ['division_code', '=', $division],
            ['position_code', '=', $position],
            ['date', '=', $report_salary],
            ['total_salary', '=', $report_salary],
        ])->first();

        $pdf=PDF::loadView('report.report_print');

        return $pdf->stream();

    }
}
