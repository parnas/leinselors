<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

/**
 * Class ScheduleDay
 *
 * @property int $id
 * @property int $schedule_id
 * @property string $weekday
 * @property string $start
 * @property string $end
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Schedule $schedule
 */
class ScheduleDay extends Model
{
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
