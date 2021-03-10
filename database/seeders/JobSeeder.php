<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Job::create([
            'name' => 'Desarrollador Front End',
            'description' => 'Desarrolla interfaces de usuario dinamicas',
            'base_salary' => '3500',
            'department_id' => 2
        ]);

        Job::create([
            'name' => 'Desarrollador Movil',
            'description' => 'Desarrolla logicas de negocio para aplicaciones moviles',
            'base_salary' => '1500',
            'department_id' => 3
        ]);

        Job::create([
            'name' => 'Administrador de Base de Datos',
            'description' => 'Administra la integridad y el funcionamiento correcto de bases de datos',
            'base_salary' => '2800',
            'department_id' => 1
        ]);

        Job::create([
            'name' => 'Dev Ops',
            'description' => 'Implementa tecnicas seguras de despligue de aplicaciones',
            'base_salary' => '3000',
            'department_id' => 1
        ]);
    }
}
