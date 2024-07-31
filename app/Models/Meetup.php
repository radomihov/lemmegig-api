<?php

namespace App\Models;

use App\Enums\MeetupType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => MeetupType::class,
    ];

    public function gigs()
    {
        return $this->belongsToMany(Gig::class);
    }
    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
