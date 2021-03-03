<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('manager')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::where('department_id', '=', 'null')->get();
        $departments = Department::all();
        return view('departments.create', compact('employee', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $department->saved();

        return redirect('/Departments')->with('status','Departamento Creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department = Department::with('manager')->find($department);
        $employee = Employee::where('department_id', '=', 'null')->get();
        return view('departments.edit', compact('employee'))->with('department', $department);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department = Department::find($department);
        $department->name = $request->input('name');
        $department->description = $request->input('description');

        if ($request->input('employee_id') != Null) {
            $department->employee_id = $request->input('employee_id');
        }

        if ($request->input('parent_id') != Null) {
            $department->parent_id = $request->input('parent_id');
        }

        $department->saved();

        return redirect('/Departments')->with('status','Departamento Actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department = Department::find($department);
        $department->delete();

        return redirect('/Departments')->with('status','Departamento Eliminado Correctamente.');

    }
}
