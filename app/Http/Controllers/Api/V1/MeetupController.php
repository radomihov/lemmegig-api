<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetupRequest;
use App\Http\Requests\UpdateMeetupRequest;
use App\Http\Resources\MeetupResource;
use App\Models\Meetup;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MeetupResource::collection(Meetup::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeetupRequest $request)
    {
        $meetUp = Meetup::create($request->validated());

        return MeetupResource::make($meetUp);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meetup $meetup)
    {
        return MeetupResource::make($meetup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetupRequest $request, Meetup $meetUp)
    {
        $meetUp->update($request->validated());

        return MeetupResource::make($meetUp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meetup $meetUp)
    {
        $meetUp->delete();

        return response()->noContent();
    }
}
