<?php

namespace App\Console\Commands;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count Salary Karyawan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $time = strtotime(date("Y/m/d"));
        
        $employee = DB::table('absensi')
            ->join('employee', 'absensi.nik', '=', 'employee.nik')
            ->join('salary', 'salary.salary_code', '=', 'employee.salary_code')
            ->whereBetween('tanggal', [date("Y-m-"."29", strtotime("-2 month", $time)), date('Y-m-').'28'])
            ->get();

       // $karyawan_array = array();
        foreach ($employee as $item) {
            $start_time = $item->jam_masuk;
            $end_time = $item->jam_keluar;

            $time1 = new \DateTime($start_time);
            $time2 = new \DateTime($end_time);
            $interval = $time1->diff($time2);
            $jam = $interval->format('%h');

            DB::table('report_salary')->insert(
                ['nik' => $item->nik, 
                'total_salary' => $item->salary*$jam,
                'date' => date('Y-m-d')]
            );
           
            print ("NIK : ".$item->nik." Tanggal : ".$item->tanggal." GAJI : ".$item->salary*$jam );
                     
        }
    }
}