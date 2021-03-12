<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name'              => 'Selena',
                'last_name'         => 'Estefan',
                'work_phone'        => '66345467',
                'personal_phone'    => '66345467',
                'image_name'        => 'selena906090.jpg',
                'sex'               => 'Mujer',
                'ID_number'         => 'E001',
                'address'           => 'Las Lomas 17',
                'nationality'       => 'Boliviana',
                'passport'          => 'PS1102023200201',
                'birthdate'         => '2000-04-12',
                'birthplace'        => 'Santa Cruz',
                'marital_status'    => 'Soltera',
                'children'          => 0,
                'emergency_contact' => '75461548',
                'status'            => 1,
                'user_id'           => 1
            ],
            [
                'name'              => 'Paulina',
                'last_name'         => 'Rubio',
                'work_phone'        => '78345467',
                'personal_phone'    => '66445577',
                'image_name'        => 'paulina.jpg',
                'sex'               => 'Mujer',
                'ID_number'         => 'E002',
                'address'           => 'Las Lomas 18',
                'nationality'       => 'Mexicana',
                'passport'          => 'PS222023200201',
                'birthdate'         => '1980-07-01',
                'birthplace'        => 'Santa Cruz',
                'marital_status'    => 'Soltera',
                'children'          => 0,
                'emergency_contact' => '66461548',
                'status'            => 1,
                'user_id'           => 2
            ]

        ]);
    }
}
