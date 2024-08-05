<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $table = 'gigs';

    public function meetups()
    {
        return $this->hasMany(Meetup::class);
    }

    protected $fillable = [
        'image',
        'name',
        'description',
        'fee',
        'is_public',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];
}
