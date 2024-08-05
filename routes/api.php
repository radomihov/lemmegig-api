<?php

use App\Http\Controllers\Api\V1\GigController;
use App\Http\Controllers\Api\V1\MeetupController;
use App\Http\Controllers\Api\V1\ArtistController;
use App\Http\Controllers\Api\V1\VenueController;
use App\Http\Controllers\Api\V1\SongController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    //Artists
    Route::apiResource('/artists', ArtistController::class);

    //Gigs
    Route::apiResource('/gigs', GigController::class);
    Route::get('/public-gigs', [GigController::class, 'getPublicGigs']);

    //Meetups
    Route::apiResource('/meetups', MeetupController::class);

    //Songs
    Route::apiResource('/songs', SongController::class);

    //Venues
    Route::apiResource('/venues', VenueController::class);
});



//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
