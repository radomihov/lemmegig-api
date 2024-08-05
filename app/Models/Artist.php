<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function meetups()
    {
        return $this->belongsToMany(Meetup::class);
    }
}
