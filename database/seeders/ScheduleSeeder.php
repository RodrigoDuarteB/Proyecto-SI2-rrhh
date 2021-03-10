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
            'clock_in' => '08:00',
            'clock_out' => '13:00',
        ]);

        Schedule::create([
            'name' => 'Turno Tarde',
            'clock_in' => '14:00',
            'clock_out' => '19:00',
        ]);

        Schedule::create([
            'name' => 'Turno Completo',
            'clock_in' => '08:00',
            'clock_out' => '19:00',
        ]);

        Schedule::create([
            'name' => 'Turno Nocturno',
            'clock_in' => '22:00',
            'clock_out' => '06:00',
        ]);
    }
}
