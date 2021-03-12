<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceController extends Controller{
    public function index(){
        $absences = Absence::orderBy('requested_date', 'DESC')->get();
        return view('absences.index', compact('absences'));
    }


    public function create(){
        return view('absences.create');
    }


    public function store(AbsenceRequest $request){
        $validated = $request->validated();
        $absence = new Absence();
        $absence->title = $request->input('title');
        $absence->reason = $request->input('reason');
        switch ($request->input('type')){
            case 1:
                $absence->type = Absence::$VACATION;
                break;
            case 2:
                $absence->type = Absence::$SICKNESS;
                break;
            case 3:
                $absence->type = Absence::$TRAVEL;
                break;
            case 4:
                $absence->type = Absence::$OTHER;
                break;
            default:
                $absence->type = Absence::$OTHER;
        }
        $absence->begin = $request->input('begin');
        $absence->end = $request->input('end');
        $absence->requested_date = Carbon::now('America/La_Paz')->toDateString();
        $absence->status = Absence::$REQUESTED;
        $absence->employee_id = auth()->user()->employee->id;
        $absence->save();
        Log::new(Log::$CREATED, 'Solicitó la ausencia con id '.$absence->id);
        return redirect()->route('absences.index')->with('success', 'Ausencia solicitada correctamente');
    }


    public function show(Absence $absence){
        try{
            Absence::findOrFail($absence->id);
            return view('absences.show', compact('absence'));
        }catch (\Exception $e){
            return redirect()->route('absences.index')->with('failed', 'La ausencia solicitada no existe');
        }
    }


    public function edit(Absence $absence){
        try{
            Absence::findOrFail($absence->id);
            return view('absences.edit', compact('absence'));
        }catch (\Exception $e){
            return redirect()->route('absences.index')->with('failed', 'La ausencia solicitada no existe');
        }
    }


    public function update(Request $request, Absence $absence){
        $validated = $request->validated();
        $absence->title = $request->input('title');
        $absence->reason = $request->input('reason');
        $absence->type = $request->input('type');
        $absence->begin = $request->input('begin');
        $absence->end = $request->input('end');
        $absence->requested_date = Carbon::now('America/La_Paz')->toDateString();
        $absence->status = Absence::$REQUESTED;
        $absence->employee_id = auth()->user()->employee()->id;
        $absence->save();
        Log::new(Log::$EDITED, 'Editó la ausencia con id '.$absence->id);
        return redirect()->route('absences.index')->with('success', 'Ausencia actualizada correctamente');
    }


    public function destroy(Absence $absence){
        try{
            $id = $absence->id;
            Absence::findOrFail($absence->id);
            Absence::destroy([$absence->id]);
        }catch (\Exception $e){
            return redirect()->route('absences.index')->with('failed', 'La ausencia solicitada no existe');
        }
        Log::new(Log::$DELETED, 'Eliminó la ausencia con id '.$id);
        return redirect()->route('absences.index')->with('success', 'Ausencia eliminada correctamente');
    }
}
