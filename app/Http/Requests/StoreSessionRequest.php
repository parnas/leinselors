<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'duration' => [
                'required',
                'integer',
                'min:' . config('booking.session.min_duration'),
                'max:' . config('booking.session.max_duration'),
                function ($attribute, $value, $fail) {
                    if ($value % config('booking.session.increment_step') !== 0) {
                        $fail('Duration must be in ' . config('booking.session.increment_step') . ' minute increments.');
                    }
                },
            ],
            'datetime' => [
                'required',
                'date_format:Y-m-d\TH:i:s'
            ],
        ];
    }
}
