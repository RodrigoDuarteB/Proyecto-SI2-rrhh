<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class AdministrativeCareerController extends Controller{

    public function index(){
        $employees = Employee::all();
        return view('administrative-careers.index', compact('employees'));
    }


    public function show(Employee $employee){
        try {
            Employee::findOrFail($employee->id);
        }catch (\Exception $e){
            return redirect()->route('administrative-careers.index')->with('failed', 'Empleado no encontrado');
        }
        return view('administrative-careers.show', compact('employee'));
    }

}
