<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;
    public function meetups()
    {
        return $this->hasMany(Meetup::class);
    }

    protected $fillable = [
        'image',
        'name',
        'venue',
        'artist',
        'description',
        'start',
        'end',
        'fee',
        'is_public',
        'created_at',
        'updated_at',
    ];
}
