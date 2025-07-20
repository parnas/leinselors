<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $default = Schedule::create(['id' => 1, 'name' => 'default']);
        $additional = Schedule::create(['id' => 2, 'name' => 'additional']);

        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday'] as $day) {
            ScheduleDay::create([
                'schedule_id' => $default->id,
                'weekday' => $day,
                'start' => '09:00',
                'end' => '17:00',
            ]);
        }

        foreach (['friday', 'saturday', 'sunday'] as $day) {
            ScheduleDay::create([
                'schedule_id' => $additional->id,
                'weekday' => $day,
                'start' => '11:00',
                'end' => '15:30',
            ]);
        }
    }
}
