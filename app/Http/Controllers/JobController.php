<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('department')->get();
        return view('jobss.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('jobss.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $searchfirst = Job::where('name', '=', $request->input('name'))->get();
        if (count($searchfirst) < 1) {
            $job = new Job();
            $job->name = $request->input('name');
            $job->description = $request->input('description');
            $job->base_salary = $request->input('base_salary');
            $job->department_id = $request->input('department_id');
            $job->save();
        } else {
            return redirect('/jobs/create')->with('failed', 'Cargo con el Nombre: "' . $request->input('name') . '" ya existe');
        }
        return redirect('/jobs')->with('success', 'Cargo Creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $departments = Department::all();
        return view('jobss.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $searchfirst = Job::where('name', '=', $request->input('name'))->get();
        $job = Job::find($job->id);
        if ($job->name != $request->input('name')) {
            if (!count($searchfirst) < 1) {
                return redirect('/jobs/edit')->with('failed', 'Cargo con el Nombre: "' . $request->input('name') . '" ya existe');
            } else {
                $job->name = $request->input('name');
            }
        } else {
            $job->name = $request->input('name');
        }

        $job->description = $request->input('description');
        $job->base_salary = $request->input('base_salary');
        $job->department_id = $request->input('department_id');
        $job->save();

        return redirect('/jobs')->with('success', 'Cargo Actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job = Job::find($job->id);
        $job->delete();

        return redirect('/jobs')->with('status', 'Cargo Creado Correctamente.');
    }
}
