<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGigRequest;
use App\Http\Requests\UpdateGigRequest;
use App\Http\Resources\GigResource;
use App\Models\Gig;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GigResource::collection(Gig::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGigRequest $request)
    {
        $gig = Gig::create($request->validated());

        return GigResource::make($gig);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gig $gig)
    {
        return GigResource::make($gig);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGigRequest $request, Gig $gig)
    {
       $gig->update($request->validated());

        return GigResource::make($gig);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gig $gig)
    {
        $gig->delete();

        return response()->noContent();
    }
}
