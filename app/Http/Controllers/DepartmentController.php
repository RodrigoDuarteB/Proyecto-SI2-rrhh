<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Queue\Events\JobProcessed;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('manager')->with('subDepartments', 'parent')->with('jobs')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Employee::all();
        $departments = Department::all();
        return view('departments.create', compact('cargos', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $validated = $request->validated();
        $department = new Department();
        $department->name = $request->input('name');
        $department->description = $request->input('description');

        if ($request->input('employee_id') != Null) {
            $department->employee_id = $request->input('employee_id');
        }

        if ($request->input('parent_id') != Null) {
            $department->parent_id = $request->input('parent_id');
        }

        $department->save();

        return redirect('/departments')->with('status', 'Departamento Creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department = Department::with('manager')->find($department->id);
        $employees = Department::with('jobs')->where('id','=', $department->id)->get();
        return view('departments.show', compact('department','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department = Department::with('manager')->find($department->id);
        $departments = Department::all();
        $cargos = Employee::all();
        return view('departments.edit', compact('cargos', 'departments'))->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();
        $department =Department::find($department->id);
        $department->name = $request->input('name');
        $department->description = $request->input('description');


        if ($request->input('employee_id') != Null) {
            if (($request ->input('employee_id')) == 'delete') {
                $department->employee_id = null;
            }else{

                $department->employee_id = $request->input('employee_id');
            }
        }




        if ($request->input('parent_id') != Null) {
            if (($request->input('parent_id')) == 'delete') {
                $department->parent_id = null;
            }else{

                $department->parent_id = $request->input('parent_id');
            }
        }

        $department->save();

        return redirect('/departments')->with('status', 'Departamento Actualizado Correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department = Department::find($department->id);
        $department->delete();

        return redirect('/departments')->with('status', 'Departamento Eliminado Correctamente.');
    }
}
