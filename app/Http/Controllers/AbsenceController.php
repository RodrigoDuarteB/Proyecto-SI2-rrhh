<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
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
        $absence->type = $request->input('type');
        $absence->begin = $request->input('begin');
        $absence->end = $request->input('end');
        $absence->requested_date = date('d-m-Y');
        $absence->status = Absence::$REQUESTED;
        $absence->employee_id = auth()->user()->employee()->id;
        $absence->save();
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
        $absence->requested_date = date('d-m-Y');
        $absence->status = Absence::$REQUESTED;
        $absence->employee_id = auth()->user()->employee()->id;
        $absence->save();
        return redirect()->route('absences.index')->with('success', 'Ausencia actualizada correctamente');
    }


    public function destroy(Absence $absence){
        try{
            Absence::findOrFail($absence->id);
            Absence::destroy([$absence->id]);
        }catch (\Exception $e){
            return redirect()->route('absences.index')->with('failed', 'La ausencia solicitada no existe');
        }
        return redirect()->route('absences.index')->with('success', 'Ausencia eliminada correctamente');
    }
}
