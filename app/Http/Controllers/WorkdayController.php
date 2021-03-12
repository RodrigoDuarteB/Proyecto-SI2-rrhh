<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkdayController extends Controller
{

    public function addWorkdayFromMobile(Request $request){
        $employee = auth()->user()->employee;
        $data["date"]       = $this->getFormatedDate();
        $data["clock_in"]   = $this->getFormatedTime();
        $data["latitude"]   = $request->latitude;
        $data["longitude"]  = $request->longitude;
        $data["status"]     = $this->getWorkdayStatus($employee, $data["date"], $data["clock_in"]);
        $data["employee_id"]= $request->employee_id;

        Workday::insert($data);
        $data["id"]         = 1;
        $data["clock_out"]  = null;
        $data["user_id"]= 1;
        //return ["Response"=>"Su asistencia fue registrada satisfactoriamente". $now->format('d-m-Y H:i:s')];
        return $data;
    }

    public function setWorkdayFromMobile(Request $request){
        $date                   = $this->getFormatedDate();
        $data["clock_out"]      = $this->getFormatedTime();
        Workday::where([
            ['employee_id','=',$request->employee_id],
            ['date', '=', $date]
        ])->update($data);
        //return redirect('workdays'.$request->input('employee_id'))->with('Mensaje','Hora de salida marcada satisfactoriamente.');
        return $data;
    }

    public function getWorkdayStatus(Employee $employee, $date, $clock_in_registered){
        $clock_in_schedule = $employee->currentContract()->planning->schedule->clock_in;
        $entry_time     = strtotime($date ." ". $clock_in_schedule);
        $datetime_in    = strtotime($date ." ". $clock_in_registered);
        if($entry_time >= $datetime_in) {
            return 1;
        } else {
            $entry_time_limit = strtotime($date ." ". "05:30:00");
            if ($datetime_in > $entry_time_limit  ) {
                return 3;
            }
            return 2;
        }
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
        $this->addWorkdayFromMobile($request);
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
