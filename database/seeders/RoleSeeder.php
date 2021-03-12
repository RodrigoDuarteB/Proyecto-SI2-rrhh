<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $empleado = ['Gestionar Personal', 'Gestionar Ordenes', 'Gestionar Asistencias', 'Gestionar Ausencias', 'Gestionar Capacitaciones', 'Gestionar Sueldos'];
        Role::create([
            'name' => 'Empleado'
        ])->syncPermissions($empleado);

        $administrador = array_merge($empleado, ['Gestionar Usuarios', 'Gestionar Departamentos',
            'Gestionar Carreras', 'Gestionar Contratos', 'Gestionar Cargos', 'Gestionar Planificaciones', 'Gestionar Horarios', 'Gestionar Roles', 'Gestionar Permisos', 'Gestionar Reportes', 'Gestionar Bitacora', 'Gestionar Seguridad', 'Gestionar Postulantes', 'Listar Personal', 'Crear Personal', 'Editar Personal', 'Eliminar Personal', 'Listar Ordenes', 'Crear Ordenes', 'Editar Ordenes', 'Eliminar Ordenes']);
        Role::create([
            'name' => 'Administrador del Sistema'
        ])->syncPermissions($administrador);

        $administradorRRHH = array_merge($empleado, ['Gestionar Departamentos', 'Gestionar Carreras', 'Gestionar Contratos', 'Gestionar Cargos', 'Gestionar Planificaciones', 'Gestionar Horarios', 'Gestionar Reportes', 'Gestionar Postulantes', 'Listar Personal', 'Crear Personal', 'Editar Personal', 'Eliminar Personal', 'Listar Ordenes', 'Crear Ordenes', 'Editar Ordenes', 'Eliminar Ordenes']);
        Role::create([
            'name' => 'Administrador de RRHH'
        ])->syncPermissions($administradorRRHH);

        $gerente = array_merge($empleado, ['Gestionar Reportes']);
        Role::create([
            'name' => 'Gerente'
        ])->syncPermissions($gerente);

        $jefeDepartamento = array_merge($empleado, ['Gestionar Departamentos', 'Gestionar Reportes']);
        Role::create([
            'name' => 'Jefe de Departamento'
        ])->syncPermissions($jefeDepartamento);

    }
}
