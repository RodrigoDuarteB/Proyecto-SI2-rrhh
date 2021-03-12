<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller{

    public static $HOUR = 20;

    public function index(){
        $employees = Employee::with('contracts')->get();
        return view('salaries.index', compact('employees'));
    }

    public function discounts(){
        $employees = Employee::with('contracts')->get();
        foreach ($employees as $employee){
            if($employee->currentContract() != null){
                $workdays = $employee->workdays;
                $enter_hour = new \DateTime($employee->currentContract()
                    ->planning->schedule->clock_in);
                foreach ($workdays as $workday){
                    $clock_in = new \DateTime($workday->clock_in);
                    $diff = $enter_hour->diff($clock_in);
                }
            }
        }
        return view('salaries.discounts');
    }

    public function extras(){
        $employees = Employee::with('contracts')->get();
        $extras = [];
        foreach ($employees as $employee){
            if($employee->currentContract() != null){
                $workdays = $employee->workdays;
                $out_hour = new \DateTime($employee->currentContract()
                    ->planning->schedule->clock_out);
                $aument = 0;
                foreach ($workdays as $workday){
                    $clock_out = new \DateTime($workday->clock_out);
                    $diff = $out_hour->diff($clock_out)->format('%H');
                    $aument += floatval($diff)*self::$HOUR;
                }
                array_push($extras, $aument);
            }
        }
        return view('salaries.extras', compact('employee', 'extras'));
    }

    public function liquid(){
        return view('salaries.liquid');
    }

}
