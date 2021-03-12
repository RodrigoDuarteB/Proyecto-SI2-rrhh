<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['applicants'] = Applicant::select(
            'applicants.id',
            'applicants.name as applicantName',
            'applicants.last_name',
            'applicants.personal_phone',
            'applicants.email',
            'jobs.name as jobName',
            'applicants.academic_degree',
            'applicants.career',
            'applicants.resume_file',
            'applicants.value',
            'applicants.status',
            )
            ->leftjoin('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->get();

        return view('applicants.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except('_token');
        $data['created_at'] = Carbon::now('America/La_Paz')->toDateString();
        $data['status'] = 0;

        if($request->hasFile('resume_file')){
            $resume_file = $request->file('resume_file');
            $name = time().$resume_file->getClientOriginalName();
            $resume_file->move(public_path('storage/curriculum_vitae'), $name);
            $data['resume_file'] = $name;
        }

        Applicant::insert($data);
        return redirect('applicants')->with('Mensaje','Su postulación fue registrada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
