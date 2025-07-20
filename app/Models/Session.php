<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 *
 * @property int $id
 * @property int $counselor_id
 * @property string $date
 * @property string $from
 * @property string $to
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Counselor $counselor
 */
class Session extends Model
{
    public function counselor()
    {
        return $this->belongsTo(Counselor::class);
    }
}
