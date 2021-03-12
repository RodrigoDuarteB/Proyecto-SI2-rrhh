<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Log;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $searchfirst = Schedule::where('name', '=', $request->input('name'))->get();
        if (count($searchfirst) < 1) {

            $schedule = new Schedule();

            $schedule->name = $request->input('name');
            $schedule->clock_in = $request->input('clock_in');
            $schedule->clock_out = $request->input('clock_out');
            $schedule->save();
        }else{
            return redirect('/schedules/create')->with('failed', 'Horario con el Nombre: "' . $request->input('name') . '" ya existe');

        }

        Log::new(Log::$CREATED, 'Creó el Horario con id '.$schedule->id.' nombre: '.$schedule->name);

        return redirect('/schedules')->with('success', 'Horario Creado Correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule->id);
        return view('schedules.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $searchfirst = Schedule::where('name', '=', $request->input('name'))->get();
        
        $schedule = Schedule::find($schedule->id);
        if($schedule->name != $request->input('name')){
            if (!count($searchfirst) < 1) {
                return redirect('/schedules/create')->with('failed', 'Horario con el Nombre: "' . $request->input('name') . '" ya existe');
            }else{
                $schedule->name = $request->input('name');
            }
        }else{
            
                $schedule->name = $request->input('name');        
        }
            $schedule->clock_in = $request->input('clock_in');
            $schedule->clock_out = $request->input('clock_out');
            $schedule->save();

            Log::new(Log::$EDITED, 'Editó el Horario con id '.$schedule->id.' nombre: '.$schedule->name);
        return redirect('/schedules')->with('success', 'Horario Actualizado Correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {   
        $scheduleID = $schedule->id;
        $scheduleName = $schedule->name;
        $schedule = Schedule::find($schedule->id);
        $schedule->delete();

        Log::new(Log::$DELETED, 'Eliminó el Horario con id '.$scheduleID.' nombre: '.$scheduleName);

        return redirect('/schedules')->with('status', 'Horario Creado Correctamente.');
    }
}
