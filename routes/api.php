<?php

use App\Http\Controllers\Api\V1\GigController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('/gigs', GigController::class);
    Route::get('/public-gigs', [GigController::class, 'getPublicGigs']);
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

