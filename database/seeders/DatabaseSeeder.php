<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Gig;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Meetup;
use App\Models\Person;
use App\Models\Song;
use App\Models\Venue;
use Database\Factories\ArtistMeetupFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Gig::factory(5)->create();
        Venue::factory(5)->create();
        Meetup::factory(5)->create();
        Person::factory(5)->create();
        Artist::factory(5)->create();
        Song::factory(5)->create();
    }
}
