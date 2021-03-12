<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use App\Models\Employee;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkdayController extends Controller
{
    public function addWorkdayFromMobile(Request $request){
        $data["date"]       = $this->getFormatedDate();
        $data["clock_in"]   = $this->getFormatedTime();
        $data["latitude"]   = $request->latitude;
        $data["longitude"]  = $request->longitude;
        $data["status"]     = null;

        $data["employee_id"]= $request->employee_id;

        Workday::insert($data);

        $data["id"]         = 1;
        $data["clock_out"]  = null;
        $data["user_id"]= 1;
        //return ["Response"=>"Su asistencia fue registrada satisfactoriamente". $now->format('d-m-Y H:i:s')];
        return $data;
    }

    public function addWorkdayFromWeb(Request $request){


        $employee = auth()->user()->employee;
        $data["date"]       = $this->getFormatedDate();
        $data["clock_in"]   = $this->getFormatedTime();
        $data["latitude"]   = $request->latitude;
        $data["longitude"]  = $request->longitude;
        $data["status"]     = $this->setWorkdayStatus($employee, $data["date"], $data["clock_in"]);

        $data["employee_id"]= isset($request->employee_id) ? $request->employee_id : $employee->id;

        Workday::insert($data);

        $data["id"]         = 1;
        $data["clock_out"]  = null;
        $data["user_id"]= 1;
        //return ["Response"=>"Su asistencia fue registrada satisfactoriamente". $now->format('d-m-Y H:i:s')];
        return $data;
    }

    public function setWorkdayFromMobile(Request $request){
        $date               = $this->getFormatedDate();
        $data["clock_out"]  = $this->getFormatedTime();
        Workday::where([
            ['employee_id','=',$request->employee_id],
            ['date', '=', $date]
        ])->update($data);
        return $data;
    }

    public function setWorkdayFromWeb(Request $request){
        $date               = $this->getFormatedDate();
        $data["clock_out"]  = $this->getFormatedTime();
        $employee = auth()->user()->employee;
        Workday::where([
            ['employee_id','=',$employee->id],
            ['date', '=', $date]
        ])->update($data);
        return $data;
    }

    public function getWorkday($date){
        $employee = auth()->user()->employee;
        $workdays = Workday::where([
            ['employee_id', '=', $employee->id],
            ['date', '=', $date]
        ])->orderBy('id', 'ASC')->get();

        return $workdays;
    }

    public function verifyWorkdayRegistered(){
        $date     = $this->getFormatedDate();
        $employee = auth()->user()->employee;
        $registered = false;
        $workday = Workday::where([
            ['employee_id', '=', $employee->id],
            ['date', '=', $date]
        ])->first();

        $employee = auth()->user()->employee;

        if ($workday === null) {
            $registered = false;
        } else {
            $registered = true;
        }
        return $registered;
    }

    public function setWorkdayStatus(Employee $employee, $date, $clock_in_registered){
        $clock_in_schedule = $employee->currentContract()->planning->schedule->clock_in;
        var_dump($clock_in_schedule);
        $entry_time     = strtotime($date ." ". $clock_in_schedule);
        $datetime_in    = strtotime($date ." ". $clock_in_registered);
        if($entry_time >= $datetime_in) {
            return 1;
        } else {
            $entry_time_limit = strtotime($date ." ". $clock_in_schedule, strtotime('+1 hours'));
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
        //$datos['workdays'] = Workday::paginate();
        //return view('workdays.index', $workdays);
        $employee = auth()->user()->employee;
        $user = auth()->user();
        $workdays = null;
        if($user->type == 3) {
            $data['workdays'] = Workday::select(
                'workdays.id',
                'workdays.date',
                'workdays.clock_in',
                'workdays.clock_out',
                'workdays.latitude',
                'workdays.longitude',
                'workdays.status',
                'employees.name'
                )
                ->leftjoin('employees', 'workdays.employee_id', '=', 'employees.id')
                ->get();
                $workdays = $data['workdays'];
        }

        if($user->type == 1 || $user->type == 2){
            $data['workdays'] = Workday::select(
                'workdays.id',
                'workdays.date',
                'workdays.clock_in',
                'workdays.clock_out',
                'workdays.latitude',
                'workdays.longitude',
                'workdays.status',
                'employees.name'
                )
                ->leftjoin('employees', 'workdays.employee_id', '=', 'employees.id')
                ->where('employee_id', '=' , $employee->id)
                ->get();
                $workdays = $data['workdays'];
        }
        $clock_in_schedule = $employee->currentContract()->planning->schedule->clock_in;
        return \view('workdays.index', compact('workdays', 'employee', 'clock_in_schedule'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = auth()->user()->employee;
        $registered = $this->verifyWorkdayRegistered();
        return view('workdays.create', compact('employee', 'registered'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->verifyWorkdayRegistered()){
            $this->setWorkdayFromMobile($request);
            return redirect()->route('workdays.index')->with('success', 'Salida registrada satisfactoriamente.');
        } else {
            $this->addWorkdayFromWeb($request);
            return redirect()->route('workdays.index')->with('success', 'Asistencia registrada satisfactoriamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workday  $workday
     * @return \Illuminate\Http\Response
     */
    public function show(Workday $workday)
    {
        $employee = auth()->user()->employee;
        return \view('workdays.show', compact('workdays', 'employee'));
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
        try {
            $id = $workday->id;
            Workday::findOrFail($workday->id);
            Workday::destroy([$workday->id]);
        }catch (\Exception $e){
            return redirect()->route('workdays.index')->with('failed', 'El Rol que intentó eliminar no existe');
        }
        Log::new(Log::$DELETED, 'Eliminó la asistencia con el id '.$id);
        return redirect()->route('workdays.index')->with('success', 'Asistencia eliminada correctamente');
    }
}
