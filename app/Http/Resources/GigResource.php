<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GigResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->img,
            'name' => $this->name,
            'venue' => $this->venue,
            'meetups' => MeetupResource::collection($this->meetups),
            'description' => $this->description,
            'start' => $this->start,
            'end' => $this->end,
            'fee' => $this->fee,
            'is_public' => $this->is_public,
        ];
    }
}
