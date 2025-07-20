<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ScheduleDay;

/**
 * Class Schedule
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection|ScheduleDay[] $scheduleDays
 * @property \Illuminate\Database\Eloquent\Collection|Counselor[] $counselors
 */
class Schedule extends Model
{
    public function scheduleDays()
    {
        return $this->hasMany(ScheduleDay::class);
    }

    public function counselors()
    {
        return $this->hasMany(Counselor::class);
    }
}
