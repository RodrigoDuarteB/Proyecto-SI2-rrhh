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
            'name' => 'Prueba',
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('prueba1234'),
            'type' => User::$ADMINISTRATOR
        ])->assignRole('Administrador del Sistema');

        User::create([
            'name' => 'Prueba',
            'email' => 'prueba2@gmail.com',
            'password' => bcrypt('prueba1234'),
            'type' => User::$EMPLOYEE
        ])->assignRole('Empleado');

        User::create([
            'name' => 'Administrador de RRHH',
            'email' => 'rrhh@gmail.com',
            'password' => bcrypt('prueba1234'),
            'type' => User::$ADMINISTRATOR_RRHH
        ])->assignRole('Empleado');
    }
}
