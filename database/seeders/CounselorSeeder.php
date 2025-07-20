<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Counselor;
use App\Models\Schedule;

class CounselorSeeder extends Seeder
{
    public function run(): void
    {
        Counselor::insert([
            [
                'name' => 'Gorgo',
                'schedule_id' => 1,
            ],
            [
                'name' => 'Inda',
                'schedule_id' => 2,
            ],
            [
                'name' => 'Harhar',
                'schedule_id' => 1,
            ],
        ]);
    }
}
