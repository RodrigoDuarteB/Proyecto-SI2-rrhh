<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            [
                'name'          => 'Contrato Developer 2018',
                'description'   => 'Este es un contrato exclusivo',
                'initial_date'  => '2018-03-24',
                'final_date'    => '2019-03-24',
                'status'        => Contract::$FULLFILLED,
                'employee_id'   => 1,
                'job_id'        => 1,
                'planning_id'   => 1
            ],
            [
                'name'          => 'Contrato Mobile Developer 2020',
                'description'   => 'Contrato con opción de trabajo remoto',
                'initial_date'  => '2020-03-24',
                'final_date'    => '2022-03-24',
                'status'        => Contract::$ACTIVE,
                'employee_id'   => 1,
                'job_id'        => 2,
                'planning_id'   => 2
            ]
        ]);
    }
}
