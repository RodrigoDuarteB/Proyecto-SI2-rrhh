<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{

    public function addWorkdayFromMobile(Request $request){
        $data["date"]       = $this->getFormatedDate();
        $data["clock_in"]   = $this->getFormatedTime();
        $data["latitude"]   = $request->latitude;
        $data["longitude"]  = $request->longitude;
        $data["status"]     = $this->getWorkdayStatus($data["clock_in"]);
        $data["employee_id"]= $request->employee_id;

        Workday::insert($data);
        $data["id"]         = 1;
        $data["clock_out"]  = $this->getFormatedTime();
        //return ["Response"=>"Su asistencia fue registrada satisfactoriamente". $now->format('d-m-Y H:i:s')];
        return $data;
    }

    public function getWorkdayStatus($clock_in_registered){
        $clock_in = new \DateTime();
        $clock_in = strtotime('21-03-2020 07:30:00');
        //$time_difference = $clock_in_registered - $clock_in;

        return 0;
    }

    function getFormatedDate(){
        $defaultTimeZone = 'UTC';
        if(date_default_timezone_get() != $defaultTimeZone)
            date_default_timezone_set($defaultTimeZone);
        $datetime = getdate();
        $datetime = date("Y-m-d");
        return $datetime;
    }

    function getFormatedTime(){
        $defaultTimeZone = 'UTC';
        if(date_default_timezone_get() != $defaultTimeZone)
            date_default_timezone_set($defaultTimeZone);
        $datetime = getdate();
        $datetime = date("H:i:s");
        return $datetime;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['workdays'] = Workday::paginate();
		return view('workdays.index', $datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workdays.create');
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
        Workday::insert($data);
        return redirect('workdays')->with('Mensaje','Su asistencia fue registrada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workday  $workday
     * @return \Illuminate\Http\Response
     */
    public function show(Workday $workday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workday  $workday
     * @return \Illuminate\Http\Response
     */
    public function edit(Workday $workday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workday  $workday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workday $workday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workday  $workday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workday $workday)
    {
        //
    }
}
