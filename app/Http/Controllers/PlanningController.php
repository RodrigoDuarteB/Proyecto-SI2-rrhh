<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;

class PlanningController extends Controller{

    public function index(){
        $plannings = Planning::all();
        return view('plannings.index', compact('plannings'));
    }


    public function create(){
        return view('plannings.create');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z,0-9, ]+)/',
            'description' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z,0-9, ]+)/',
            'schedule_id' => 'required|numeric'
        ]);
        $planning = new Planning();
        $planning->name = $request->input('name');
        $planning->description = $request->input('description');
        $planning->schedule_id = $request->input('schedule_id');
        $planning->save();
        return redirect()->route('plannings.index')->with('success', 'Planificacion Laboral creada correctamente');
    }


    public function show(Planning $planning){
        try {
            Planning::findOrFail($planning->id);
        }catch (\Exception $e){
            return redirect()->route('plannings.index')->with('failed', 'Planificacion Laboral no encontrada');
        }
        return view('plannings.show', compact('planning'));
    }


    public function edit(Planning $planning){
        try {
            Planning::findOrFail($planning->id);
        }catch (\Exception $e){
            return redirect()->route('plannings.index')->with('failed', 'Planificacion Laboral no encontrada');
        }
        return view('plannings.edit', compact('planning'));
    }


    public function update(Request $request, Planning $planning){
        $request->validate([
            'name' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z,0-9, ]+)/',
            'description' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z,0-9, ]+)/',
            'schedule_id' => 'required|numeric'
        ]);
        $planning->name = $request->input('name');
        $planning->description = $request->input('description');
        $planning->schedule_id = $request->input('schedule_id');
        $planning->save();
        return redirect()->route('plannings.index')->with('success', 'Planificacion Laboral actualizada correctamente');
    }


    public function destroy(Planning $planning){
        try {
            Planning::findOrFail($planning->id);
            $planning->delete();
        }catch (\Exception $e){
            return redirect()->route('plannings.index')->with('failed', 'Planificacion Laboral no encontrada');
        }
        return redirect()->route('plannings.index')->with('success', 'Planificacion Laboral eliminada correctamente');
    }
}
