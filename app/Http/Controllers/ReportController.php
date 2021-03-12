<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Order;

class ReportController extends Controller{

    public function index(){
        return view('reports.index');
    }


    public function employees(){
        $employees = Employee::orderBy('created_at', 'DESC')->get();
        return view('reports.employees', compact('employees'));
    }


    public function salaries(){
        $employees = Employee::with('contracts')->get();
        return view('reports.salaries', compact('employees'));
    }


    public function applicants(){
        $applicants = Applicant::orderBy('id', 'DESC')->get();
        return view('reports.applicants', compact('applicants'));
    }


    public function contracts(){
        $contracts = Contract::orderBy('employee_id', 'ASC')->get();
        return view('reports.contracts', compact('contracts'));
    }


    public function jobs(){
        $jobs = Job::all();
        return view('reports.jobs', compact('jobs'));
    }


    public function orders(){
        $orders = Order::orderBy('datetime', 'DESC')->get();
        return view('reports.orders', compact('orders'));
    }


}
