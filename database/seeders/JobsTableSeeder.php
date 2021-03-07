<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'name'          => 'Básico',
                'description'   => 'Salario base en base al mínimo nacional',
                'base_salary'   => 2400.00
            ],
            [
                'name'          => 'Técnico I',
                'description'   => 'Salario base para un técnico de nivel 1',
                'base_salary'   => 2800.00
            ],
            [
                'name'          => 'Técnico II',
                'description'   => 'Salario base para un técnico de nivel 2',
                'base_salary'   => 3200.00
            ],
            [
                'name'          => 'Profesional I',
                'description'   => 'Salario base para un profesional con título en provisión nacional de nivel 1',
                'base_salary'   => 3700.00
            ]
        ]);
    }
}
