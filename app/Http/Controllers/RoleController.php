<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller{
    public function index(){
        $roles = Role::all();
        return \view('roles.index', compact('roles'));
    }

    public function create(){
        return \view('roles.create');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|min:3'
            ]);
            Role::create(['name' => $request->input('name')]);
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('info', 'Datos erróneos');
        }
        return redirect()->route('roles.index');
    }

    public function show(Role $role){
        try {
            Role::findOrFail($role->id);
            return view('roles.show', compact('role'));
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('info', 'El Rol que intentó ver no existe');
        }
    }

    public function edit(Role $role){
        try {
            Role::findOrFail($role->id);
            return view('roles.edit', compact('role'));
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('info', 'El Rol que intentó editar no existe');
        }
    }

    public function update(Request $request, Role $role){
        try {
            $request->validate([
                'name' => 'required|string|min:3'
            ]);
            $role->name = $request->input('name');
            $role->save();
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('info', 'Datos erróneos');
        }
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role){
        try {
            Role::findOrFail($role->id);
            Role::destroy([$role->id]);
            return redirect()->route('roles.index');
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('info', 'El Rol que intentó eliminar no existe');
        }
    }
}
