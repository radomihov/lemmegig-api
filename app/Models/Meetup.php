<?php

namespace App\Models;

use App\Enums\MeetupType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    use HasFactory;

    protected $table = 'meetups';

    protected $casts = [
        'type' => MeetupType::class,
    ];
    protected $appends = ['type_label'];

    public function getTypeLabelAttribute(): string
    {
        return $this->type->label();
    }
    public function gigs()
    {
        return $this->belongsTo(Gig::class);
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
