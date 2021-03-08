<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller{

    public function __construct(){
        $this->middleware('role_or_permission:Gestionar Personal|Listar Personal')->only('index', 'show');
        $this->middleware('role_or_permission:Gestionar Personal|Crear Personal')->only('create', 'store');
        $this->middleware('role_or_permission:Gestionar Personal|Editar Personal')->only('edit', 'update');
        $this->middleware('role_or_permission:Gestionar Personal|Eliminar Personal')->only('destroy');
    }

    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create(){
        return view('employees.create');
    }

    public function store(EmployeeRequest $request){
        $validated = $request->validated();
        //se registra el empleado
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->last_name = $request->input('last_name');
        $employee->work_phone = $request->input('work_phone');
        $employee->personal_phone = $request->input('personal_phone');
        $sex = $request->input('sex');
        switch ($sex){
            case 1:
                $employee->sex = Employee::$WOMAN;
                break;
            case 2:
                $employee->sex = Employee::$MAN;
                break;
            case 3:
                $employee->sex = Employee::$OTHERSEX;
                break;
            default:
                $employee->sex = Employee::$OTHERSEX;
        }
        $employee->ID_number = $request->input('ID_number');
        $employee->address = $request->input('address');
        $employee->nationality = $request->input('nationality');
        $employee->passport = $request->input('passport');
        $employee->birthdate = $request->input('birthdate');
        $employee->birthplace = $request->input('birthplace');
        switch ($request->input('marital_status')){
            case 1:
                if($sex == 1){
                    $employee->marital_status = Employee::$SINGLE.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$SINGLE.'o';
                }else{
                    $employee->marital_status = Employee::$SINGLE.'@';
                }
                break;
            case 2:
                if($sex == 1){
                    $employee->marital_status = Employee::$MARRIED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$MARRIED.'o';
                }else{
                    $employee->marital_status = Employee::$MARRIED.'@';
                }
                break;
            case 3:
                if($sex == 1){
                    $employee->marital_status = Employee::$COMMITTED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$COMMITTED.'o';
                }else{
                    $employee->marital_status = Employee::$COMMITTED.'@';
                }
                break;
            case 4:
                if($sex == 1){
                    $employee->marital_status = Employee::$WIDOW.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$WIDOW.'o';
                }else{
                    $employee->marital_status = Employee::$WIDOW.'@';
                }
                break;
            case 5:
                if($sex == 1){
                    $employee->marital_status = Employee::$DIVORCED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$DIVORCED.'o';
                }else{
                    $employee->marital_status = Employee::$DIVORCED.'@';
                }
                break;
            case 6:
                $employee->marital_status = Employee::$OTHER;
                break;
            default:
                $employee->marital_status = Employee::$OTHER;
        }
        $employee->children = $request->input('children');
        $employee->emergency_contact = $request->input('emergency_contact');
        $employee->status = Employee::$ACTIVE;
        if($request->hasFile('image_name')){
            $image = $request->file('image_name');
            $name = time().$image->getClientOriginalName();
            $image->move(public_path().'storage/images/employees/'.$name);
            $employee->image_name = $name;
        }
        //Se crea su usuario
        $user = new User();
        $user->name = $request->input('name').' '.$request->input('last_name');;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->type = User::$EMPLOYEE;
        $user->save();
        //Se le asigna el Rol de Empleado
        $user->assignRole('Empleado');
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
        $contract->status = Contract::$ACTIVE;
        $contract-save();
        return redirect()->route('employees.index')->with('sucess', 'Empleado registrado correctamente');
    }

    public function show(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            return view('employees.show', compact('employee'));
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('failed', 'Ocurrió un error al intentar mostrar el empleado');
        }
    }

    public function edit(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            return view('employees.edit', compact('employee'));
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('failed', 'Ocurrió un error al intentar editar el empleado');
        }
    }

    public function update(EmployeeRequest $request, Employee $employee){
        $validated = $request->validated();
        //se registra el empleado
        $employee->name = $request->input('name');
        $employee->last_name = $request->input('last_name');
        $employee->work_phone = $request->input('work_phone');
        $employee->personal_phone = $request->input('personal_phone');
        $sex = $request->input('sex');
        switch ($sex){
            case 1:
                $employee->sex = Employee::$WOMAN;
                break;
            case 2:
                $employee->sex = Employee::$MAN;
                break;
            case 3:
                $employee->sex = Employee::$OTHERSEX;
                break;
            default:
                $employee->sex = Employee::$OTHERSEX;
        }
        $employee->ID_number = $request->input('ID_number');
        $employee->address = $request->input('address');
        $employee->nationality = $request->input('nationality');
        $employee->passport = $request->input('passport');
        $employee->birthdate = $request->input('birthdate');
        $employee->birthplace = $request->input('birthplace');
        switch ($request->input('marital_status')){
            case 1:
                if($sex == 1){
                    $employee->marital_status = Employee::$SINGLE.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$SINGLE.'o';
                }else{
                    $employee->marital_status = Employee::$SINGLE.'@';
                }
                break;
            case 2:
                if($sex == 1){
                    $employee->marital_status = Employee::$MARRIED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$MARRIED.'o';
                }else{
                    $employee->marital_status = Employee::$MARRIED.'@';
                }
                break;
            case 3:
                if($sex == 1){
                    $employee->marital_status = Employee::$COMMITTED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$COMMITTED.'o';
                }else{
                    $employee->marital_status = Employee::$COMMITTED.'@';
                }
                break;
            case 4:
                if($sex == 1){
                    $employee->marital_status = Employee::$WIDOW.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$WIDOW.'o';
                }else{
                    $employee->marital_status = Employee::$WIDOW.'@';
                }
                break;
            case 5:
                if($sex == 1){
                    $employee->marital_status = Employee::$DIVORCED.'a';
                }elseif ($sex == 2){
                    $employee->marital_status = Employee::$DIVORCED.'o';
                }else{
                    $employee->marital_status = Employee::$DIVORCED.'@';
                }
                break;
            case 6:
                $employee->marital_status = Employee::$OTHER;
                break;
            default:
                $employee->marital_status = Employee::$OTHER;
        }
        $employee->children = $request->input('children');
        $employee->emergency_contact = $request->input('emergency_contact');
        $employee->status = Employee::$ACTIVE;
        if($request->hasFile('image_name')){
            $image = $request->file('image_name');
            $name = time().$image->getClientOriginalName();
            $image->move(public_path().'storage/images/employees/'.$name);
            $employee->image_name = $name;
        }
        //Edita su usuario
        $user = $employee->user();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        //se edita el empleado
        $employee->save();
        return redirect()->route('employees.index')->with('sucess', 'Empleado editado correctamente');
    }

    public function destroy(Employee $employee){
        try{
            Employee::findOrFail($employee->id);
            $employee->status = Employee::$FIRED;
            return redirect()->route('employees.index')->with('sucess', 'Empleado despedido correctamente');
        }catch (\Exception $e){
            return redirect()->route('employees.index')->with('failed', 'Ocurrió un error al intentar despedir el empleado');
        }
    }
}
