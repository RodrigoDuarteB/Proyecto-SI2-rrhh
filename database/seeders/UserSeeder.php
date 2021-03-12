<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'type' => User::$ADMINISTRATOR
        ])->assignRole('Administrador del Sistema');

        User::create([
            'name' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'password' => bcrypt('empleado'),
            'type' => User::$EMPLOYEE
        ])->assignRole('Empleado');

        User::create([
            'name' => 'Administrador de RRHH',
            'email' => 'rrhh@gmail.com',
            'password' => bcrypt('rrhh'),
            'type' => User::$ADMINISTRATOR_RRHH
        ])->assignRole('Empleado');
    }
}
