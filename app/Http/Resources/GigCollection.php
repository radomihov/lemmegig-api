<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GigCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($gig) {

                $additionalData = GigResource::getDataFromMeetups($gig->id, false);

                return [
                    'id' => $gig->id,
                    'image' => $gig->img,
                    'name' => $gig->name,
                    'description' => $gig->description,
                    'fee' => $gig->fee,
                    'isPublic' => $gig->is_public,
                    'date' => $additionalData['date'],
                    'time' => $additionalData['time'],
                    'venueNames' => $additionalData['venue_names'],
                    'artistNames' => $additionalData['artist_names'],
                ];
            }),
        ];
    }
}
