<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller{

    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create(){
        return view('employees.create');
    }

    public function store(EmployeeRequest $request){
        try {
            $validated = $request->validated();
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->last_name = $request->input('last_name');
            $employee->work_phone = $request->input('work_phone');
            $employee->personal_phone = $request->input('personal_phone');
            $employee->sex = $request->input('sex');
            $employee->ID_number = $request->input('ID_number');
            $employee->address = $request->input('address');
            $employee->nationality = $request->input('nationality');
            $employee->passport = $request->input('passport');
            $employee->birthdate = $request->input('birthdate');
            $employee->birthplace = $request->input('birthplace');
            $employee->marital_status = $request->input('marital_status');
            $employee->children = $request->input('children');
            $employee->emergency_contact = $request->input('emergency_contact');
            $employee->status = Employee::$ACTIVE;
            if($request->hasFile('image_name')){
                //pendiente
            }

        }catch (\Exception $e){

        }
    }

    public function show(Employee $employee){
        //
    }

    public function edit(Employee $employee){
        //
    }

    public function update(Request $request, Employee $employee){
        //
    }

    public function destroy(Employee $employee){
        //
    }
}
