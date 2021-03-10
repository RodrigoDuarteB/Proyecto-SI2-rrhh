<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Department::create([
            'name' => 'Desarrollo',
            'description' => 'Departamento encargado del desarrollo de aplicaiones en el ámbito web'
        ]);

        Department::create([
            'name' => 'Desarrollo Web',
            'description' => 'Departamento encargado del desarrollo de aplicaiones en el ámbito web',
            'parent_id' => 1
        ]);

        Department::create([
            'name' => 'Desarrollo Movil',
            'description' => 'Departamento encargado del desarrollo de aplicaiones en el ámbito web',
            'parent_id' => 1
        ]);

    }
}
