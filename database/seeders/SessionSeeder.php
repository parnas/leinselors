<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    public function run(): void
    {
        Session::insert([
            [
                'counselor_id' => 1,
                'email' => 'dude@example.com',
                'date' => '2025-07-24',
                'from' => '10:00',
                'to' => '11:00',
            ],
            [
                'counselor_id' => 1,
                'email' => 'dude@example.com',
                'date' => '2025-07-24',
                'from' => '12:00',
                'to' => '13:30',
            ],
            [
                'counselor_id' => 1,
                'email' => 'dude@example.com',
                'date' => '2025-07-24',
                'from' => '15:00',
                'to' => '16:30',
            ],
            [
                'counselor_id' => 3,
                'email' => 'dude@example.com',
                'date' => '2025-07-24',
                'from' => '11:30',
                'to' => '12:30',
            ],
            [
                'counselor_id' => 3,
                'email' => 'dude@example.com',
                'date' => '2025-07-25',
                'from' => '11:30',
                'to' => '12:30',
            ],
        ]);
    }
}
