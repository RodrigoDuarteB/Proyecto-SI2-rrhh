<?php

namespace Database\Seeders;

use App\Models\Planning;
use Illuminate\Database\Seeder;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Planning::create([
            'name' => 'Estandar 25 Horas a la semana/Mañana',
            'description' => 'Se trabaja en un horario de 5 horas al dia en la mañana',
            'schedule_id' => 1
        ]);

        Planning::create([
            'name' => 'Estandar 25 Horas a la semana/Tarde',
            'description' => 'Se trabaja en un horario de 5 horas al dia en la tarde',
            'schedule_id' => 2
        ]);

        Planning::create([
            'name' => 'Completo 55 Horas a la semana',
            'description' => 'Se trabaja en un horario de 10 horas al dia seguido',
            'schedule_id' => 3
        ]);

        Planning::create([
            'name' => 'Estandar 40 Horas a la semana/Nocturno',
            'description' => 'Se trabaja en un horario de 8 horas al dia, durante toda la noche',
            'schedule_id' => 4
        ]);
    }
}
