<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller{

    public function index(){
        $roles = Role::orderBy('name', 'ASC')->get();
        return \view('roles.index', compact('roles'));
    }


    public function create(){
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return \view('roles.create', compact('permissions'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z, ]+)/'
        ]);
        $searchFirst = Role::where('name', '=', $request->input('name'))->get();
        if(count($searchFirst) < 1){
            $role = Role::create(['name' => $request->input('name')]);
            $permissions = $request->input('permissions');
            if(!empty($permissions)){
                if(count($permissions) > 0){
                    $role->syncPermissions($permissions);
                }
            }
        }else{
            return redirect()->route('roles.create')->with('failed', 'Rol '
                .$request->input('name').' ya existe');
        }
        Log::new(Log::$CREATED, 'Creó el rol con id '.$role->id);
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    }


    public function show(Role $role){
        try {
            Role::findOrFail($role->id);
            return view('roles.show', compact('role'));
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('failed', 'El Rol que intentó ver no existe');
        }
    }


    public function edit(Role $role){
        try {
            Role::findOrFail($role->id);
            $permissions = Permission::orderBy('name', 'ASC')->get();
            return view('roles.edit', compact('role', 'permissions'));
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('failed', 'El Rol que intentó editar no existe');
        }
    }


    public function update(Request $request, Role $role){
        $request->validate([
            'name' => 'required|string|min:3|regex:/(^[A-Z][A-Z,a-z, ]+)/'
        ]);
        $searchFirst = Role::where('name', '=', $request->input('name'))->get();
        if($request->input('name') != $role->name){
            if(count($searchFirst) < 1){
                $role->name = $request->input('name');
                $role->save();
            }else{
                return redirect()->route('roles.edit', $role)->with('failed', 'Rol '
                    .$request->input('name').' ya existe');
            }
        }
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            if(count($permissions) > 0){
                $role->syncPermissions($permissions);
            }
        }else{
            $role->syncPermissions([]);
        }
        Log::new(Log::$EDITED, 'Editó el rol con id '.$role->id);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
    }


    public function destroy(Role $role){
        try {
            $id = $role->id;
            Role::findOrFail($role->id);
            Role::destroy([$role->id]);
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('failed', 'El Rol que intentó eliminar no existe');
        }
        Log::new(Log::$DELETED, 'Eliminó el rol con id '.$id);
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');;
    }

}
