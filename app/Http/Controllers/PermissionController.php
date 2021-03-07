<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller{

    public function index(){
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return \view('permissions.index', compact('permissions'));
    }

    public function create(){
        return \view('permissions.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|regex:/(^[A-Z][A-Z,a-z, ]+)/'
        ]);
        $searchFirst = Permission::where('name', '=', $request->input('name'))->get();
        if(count($searchFirst) < 1){
            Permission::create(['name' => $request->input('name')]);
        }else{
            return redirect()->route('permissions.create')->with('failed', 'Permiso '
                .$request->input('name').' ya existe');
        }
        return redirect()->route('permissions.index')->with('success', 'Permiso creado correctamente');
    }

    public function show(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            return view('permissions.show', compact('permission'));
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('failed', 'El permiso que intentó ver no existe');
        }
    }

    public function edit(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            return view('permissions.edit', compact('permission'));
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('failed', 'El permiso que intentó editar no existe');
        }
    }

    public function update(Request $request, Permission $permission){
        $request->validate([
            'name' => 'required|string|regex:/(^[A-Z][A-Z,a-z, ]+)/'
        ]);
        $searchFirst = Permission::where('name', '=', $request->input('name'))->get();
        if($request->input('name') != $permission->name){
            if(count($searchFirst) < 1){
                $permission->name = $request->input('name');
                $permission->save();
            }else{
                return redirect()->route('permissions.edit', $permission)->with('failed', 'Permiso '
                    .$request->input('name').' ya existe');
            }
        }
        return redirect()->route('permissions.index')->with('success', 'Permiso actualizado correctamente');
    }

    public function destroy(Permission $permission){
        try {
            Permission::findOrFail($permission->id);
            Permission::destroy([$permission->id]);
        }catch (\Exception $e){
            return redirect()->route('permissions.index')->with('failed', 'El Permiso que intentó eliminar no se encontró');
        }
        return redirect()->route('permissions.index')->with('success', 'Permiso eliminado correctamente');
    }
}
