<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name'          => 'Recursos Humanos',
                'description'   => 'Administra los empleados de la persona',
                'parent_id'     => null,
                'employee_id'   => null
            ]
        ]);
    }
}
