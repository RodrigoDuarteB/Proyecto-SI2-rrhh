<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Permission::create([
           'name' => 'Gestionar Usuarios'
        ]);
        Permission::create([
            'name' => 'Gestionar Personal'
        ]);
        Permission::create([
            'name' => 'Gestionar Ordenes'
        ]);
        Permission::create([
            'name' => 'Gestionar Departamentos'
        ]);
        Permission::create([
            'name' => 'Gestionar Asistencias'
        ]);
        Permission::create([
            'name' => 'Gestionar Ausencias'
        ]);
        Permission::create([
            'name' => 'Gestionar Carreras'
        ]);
        Permission::create([
            'name' => 'Gestionar Capacitaciones'
        ]);
        Permission::create([
            'name' => 'Gestionar Contratos'
        ]);
        Permission::create([
            'name' => 'Gestionar Cargos'
        ]);
        Permission::create([
            'name' => 'Gestionar Planificaciones'
        ]);
        Permission::create([
            'name' => 'Gestionar Horarios'
        ]);
        Permission::create([
            'name' => 'Gestionar Roles'
        ]);
        Permission::create([
            'name' => 'Gestionar Permisos'
        ]);
        Permission::create([
            'name' => 'Gestionar Reportes'
        ]);
        Permission::create([
            'name' => 'Gestionar Sueldos'
        ]);
        Permission::create([
            'name' => 'Gestionar Bitacora'
        ]);
        Permission::create([
            'name' => 'Gestionar Seguridad'
        ]);
        Permission::create([
            'name' => 'Gestionar Postulantes'
        ]);
    }
}
