<?php
return [
    'session' => [
        'min_duration' => env('BOOKING_SESSION_MIN_DURATION', 30),
        'max_duration' => env('BOOKING_SESSION_MAX_DURATION', 120),
        'increment_step' => env('BOOKING_SESSION_INCREMENT_STEP', 15),
    ],
];
