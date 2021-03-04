<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller{

    public function index(){
        $permissions = Permission::all();
        return \view('permissions.index', compact('permissions'));
    }

    public function create(){
        return \view('permissions.create');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|min:3'
            ]);
            Permission::create(['name' => $request->input('name')]);
            return redirect()->route('permissions.index')->with('info', 'Permiso creado correctamente');
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('info', 'Datos erróneos');
        }
    }

    public function show(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            return view('permissions.show', compact('permission'));
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('info', 'El permiso que intentó ver no existe');
        }
    }

    public function edit(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            return view('permissions.edit', compact('permission'));
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('info', 'El permiso que intentó editar no existe');
        }
    }

    public function update(Request $request, Permission $permission){
        try {
            $request->validate([
                'name' => 'required|string|min:3'
            ]);
            $permission->name = $request->input('name');
            $permission->save();
            return redirect()->route('permissions.index')->with('info', 'Permiso creado correctamente');
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('info', 'Datos erróneos');
        }
    }

    public function destroy(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            Permission::destroy([$permission->id]);
            return redirect()->route('permissions.index')->with('info', 'Permiso eliminado correctamente');
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('info', 'El Permiso que intentó eliminar no existe');
        }
    }
}
