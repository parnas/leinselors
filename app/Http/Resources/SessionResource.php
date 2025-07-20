<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'counselor' => $this->counselor->name,
            'date' => $this->date,
            'from' => $this->from,
            'to' => $this->to,
        ];
    }
}
