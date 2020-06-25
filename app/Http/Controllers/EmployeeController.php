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
        $employee = DB::table('employee')->get();

        return view('employee.show_employee', ['employee' => $employee, 'position'=>$position, 'division' =>$division]);
    }
}
