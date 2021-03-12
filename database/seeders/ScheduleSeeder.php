<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Schedule::create([
            'name' => 'Turno Mañana',
            'clock_in' => '12:00',
            'clock_out' => '17:00',
        ]);

        Schedule::create([
            'name' => 'Turno Tarde',
            'clock_in' => '18:00',
            'clock_out' => '23:00',
        ]);

        Schedule::create([
            'name' => 'Turno Completo',
            'clock_in' => '12:00',
            'clock_out' => '23:00',
        ]);

        Schedule::create([
            'name' => 'Turno Nocturno',
            'clock_in' => '02:00',
            'clock_out' => '10:00',
        ]);
    }
}
