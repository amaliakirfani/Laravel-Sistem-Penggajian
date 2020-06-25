<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = DB::table('employee')->get();

        return view('employee.show_employee', ['employee' => $employee]);
    }
}
