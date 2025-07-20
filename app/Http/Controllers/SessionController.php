<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Counselor;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Resources\SessionResource;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(StoreSessionRequest $request)
    {
        $from = \Carbon\Carbon::parse($request->input('datetime'));
        $duration = (int) $request->input('duration');
        $to = (clone $from)->addMinutes($duration);

        // This should be a custom exception, instead of Runtime, which is a bit outside the scope
        try {
            $session = Counselor::bookAvailableForTime($from, $to, $request->input('email'));
        } catch (\RuntimeException $e) {
            throw ValidationException::withMessages([
                'email' => $e->getMessage(),
            ]);
        }

        return response()->json(
            new SessionResource($session)
        );
    }
}
