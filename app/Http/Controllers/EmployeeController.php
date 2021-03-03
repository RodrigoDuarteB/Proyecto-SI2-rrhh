<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\User;

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
            //se registra el empleado
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
                $image = $request->file('image_name');
                $name = time().$image->getClientOriginalName();
                $image->move(public_path().'storage/images/employees/'.$name);
                $employee->image_name = $name;
            }
            //Se asigna departamento
            $employee->department_id = $request->input('department');
            //Se crea su usuario
            $user = new User();
            $user->name = $request->input('name').' '.$request->input('last_name');;
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            //se guarda su usuario
            $employee->user_id = $user->id;
            //se guarda el empleado
            $employee->save();

            //se le asigna un contrato
            $contract = new Contract();
            $contract->name = $request->input('contract_name');
            $contract->description = $request->input('contract_description');
            $contract->initial_date = date('Y-m-d');
            $contract->final_date = $request->input('contract_final_date');
            $contract->employee_id = $employee->id;
            $contract->job_id = $request->input('contract_job');
            $contract->planning_id = $request->input('contract_planning');
            $contract-save();

        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al registrar');
        }
        return redirect()->route('employees.index')->with('info', 'Empleado registrado correctamente');
    }

    public function show(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            return view('employees.show', compact('employee'));
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar mostrar el empleado');
        }
    }

    public function edit(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            return view('employees.edit', compact('employee'));
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar editar el empleado');
        }
    }

    public function update(EmployeeRequest $request, Employee $employee){
        try {
            $validated = $request->validated();
            //se edita solo los datos del empleado
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
                $image = $request->file('image_name');
                $name = time().$image->getClientOriginalName();
                $image->move(public_path().'storage/images/employees/'.$name);
                $employee->image_name = $name;
            }
            $employee->save();
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar editar');
        }
        return redirect()->route('employees.index')->with('info', 'Empleado editado correctamente');
    }

    public function destroy(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            $employee->status = Employee::$FIRED;
            return redirect()->route('employees.index')->with('info', 'Empleado despedido correctamente');
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar despedir el empleado');
        }
    }
}
