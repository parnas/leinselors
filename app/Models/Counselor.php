<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class Counselor
 *
 * @property int $id
 * @property string $name
 * @property int $schedule_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Schedule $schedule
 * @property \Illuminate\Database\Eloquent\Collection|Session[] $sessions
 */
class Counselor extends Model
{
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function scopeAvailableForTime($query, Carbon $from, Carbon $to): Builder
    {
        $weekday = strtolower($from->englishDayOfWeek);
        $fromTime = $from->format('H:i:s');
        $toTime = $to->format('H:i:s');
        $date = $from->toDateString();

        // Joins would be quicker (noticeably, probably). Not necessary for just a few counselors.
        return $query
            ->whereHas('schedule.scheduleDays', function ($q) use ($weekday, $fromTime, $toTime) {
                $q->where('weekday', $weekday)
                  ->where('start', '<=', $fromTime)
                  ->where('end', '>=', $toTime);
            })
            ->whereDoesntHave('sessions', function ($q) use ($date, $fromTime, $toTime) {
                $q->where('date', $date)
                  ->where(function ($q2) use ($fromTime, $toTime) {
                      $q2->where(function ($q3) use ($fromTime, $toTime) {
                          $q3->where('from', '<', $toTime)
                             ->where('to', '>', $fromTime);
                      });
                  });
            });
    }

    public static function bookAvailableForTime(Carbon $from, Carbon $to, string $email): Session
    {
        return DB::transaction(function () use ($from, $to, $email) {
            // Instead of ->inRandomOrder()->first() we can use other logic on how to select counselor from available ones
            // Could even be a pluggable Strategy pattern Interface ("MostAvailableBookingStrategy", "TightestFitBookingStrategy"...)
            $counselor = self::availableForTime($from, $to)->lockForUpdate()->inRandomOrder()->first();

            if (!$counselor) {
                throw new \RuntimeException('No available counselor found for the requested time.');
            }

            $session = new \App\Models\Session();
            $session->counselor_id = $counselor->id;
            $session->email = $email;
            $session->date = $from->toDateString();
            $session->from = $from->format('H:i:s');
            $session->to = $to->format('H:i:s');
            $session->save();

            return $session;
        });
    }
}
