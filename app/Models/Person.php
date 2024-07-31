<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'person_id', 'id');
    }
}
