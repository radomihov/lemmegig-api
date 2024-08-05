<?php

namespace App\Http\Resources;

use App\Enums\MeetupType;
use App\Models\Meetup;
use App\Models\MeetupArtist;
use App\Models\Venue;
use DateTime;
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
        $additionalData = $this->getDataFromMeetups($this->id, true);

        return [
            'id' => $this->id,
            'image' => $this->img,
            'name' => $this->name,
            'description' => $this->description,
            'fee' => $this->fee,
            'isPublic' => $this->is_public,
            'date' => $additionalData['date'],
            'time' => $additionalData['time'],
            'venueNames' => $additionalData['venue_names'],
            'artistNames' => $additionalData['artist_names'],
            'meetups' => $additionalData['meetups'],
            'venues' => $additionalData['venues'],
            'artists' => $additionalData['artists'],
        ];
    }
    public static function getDataFromMeetups(int $gigId, $getWithCollections =  false): array {

        $meetups = Meetup::where('gig_id', $gigId)->get();
        $data = [
            'start' => null,
            'date' => null,
            'time' => null,
            'meetup_ids' => [],
            'venue_ids' => [],
            'artist_names'=> '',
            'venue_names'=> '',
        ];

        foreach ($meetups as $meetup) {
            //Only get data for show meetups for Gig
            if ($meetup->type == MeetupType::LIVE_SHOW) {

                $data['meetup_ids'][] = $meetup->id;

                if (empty($data['start']) || $meetup->start < $data['start']) {
                    $data['start'] = new DateTime($meetup->start);
                }

                if(!in_array($meetup->venue_id, $data['venue_ids'])) {
                    $data['venue_ids'][] = $meetup->venue_id;
                }
            }
        }

        $data['date'] = $data['start']?->format('d/m/Y');
        $data['time'] = $data['start']?->format('H:i');;
        unset($data['start']);

        $artists = MeetupArtist::whereIn('meetup_id', $data['meetup_ids'])
            ->join('artists as a','a.id', '=', 'meetup_artists.artist_id')->get();
        $data['artist_names'] =  implode(',', $artists->pluck('name')->toArray());

        $venues = Venue::whereIn('id', $data['venue_ids'])->get();
        $data['venue_names'] = implode(',', $venues->pluck('name')->toArray());

        if ($getWithCollections) {
            $data['artists'] = ArtistResource::collection($artists);
            $data['venues'] = VenueResource::collection($venues);
            $data['meetups'] = MeetupResource::collection($meetups);
        }

        return $data;
    }

}
