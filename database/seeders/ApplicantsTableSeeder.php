<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants')->insert([
            [
                'name'              => 'Scarlett',
                'last_name'         => 'Johansson',
                'personal_phone'    => '72151122',
                'email'             => 'sjohanson@mrik.com',
                'sex'               => 'Mujer',
                'nationality'       => 'Boliviana',
                'birthdate'         => '1990/05/16',
                'birthplace'        => 'Santa Cruz',
                'job_id'            => 4,
                'academic_degree'   => 'Licenciatura',
                'career'            => 'Economía',
                'resume_file'       => 'scarlett.pdf',
                'value'             => 'Muy buena',
                'status'            => Applicant::$FEATURED,
                'created_at'        => Carbon::now('America/La_Paz')->toDateString(),
            ],
            [
                'name'              => 'Cameron',
                'last_name'         => 'Diaz',
                'personal_phone'    => '72341122',
                'email'             => 'cdiaz@mrik.com',
                'sex'               => 'Mujer',
                'nationality'       => 'Boliviana',
                'birthdate'         => '1989/11/04',
                'birthplace'        => 'Santa Cruz',
                'job_id'            => 2,
                'academic_degree'   => 'Licenciatura',
                'career'            => 'Administración de Empresas',
                'resume_file'       => 'cameron.pdf',
                'value'             => 'Excelente',
                'status'            => Applicant::$CONTRACTED,
                'created_at'        => Carbon::now('America/La_Paz')->toDateString(),
            ]
        ]);
    }
}
