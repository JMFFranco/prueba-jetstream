<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueRequest;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return Venue::all();
        return Venue::where("venue_name", "ilike", "%$request->search%")
        ->where("venue_max_capacity", ">", $request->input("capacity", 0))
        ->with("events")
        ->orderBy("id", "desc")
        ->get();
        //->dd();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueRequest $request)
    {
        $event = Venue::create($request->all());
        return response()->json([
            "status" => true,
            "event" => $event
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        $venue->load("events");
        return response()->json(["status" => true, "" => $venue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        if ($venue->update($request->all())) {
            return response()->json(["status" => true, "venue" => $venue]);
        }
        return response()->json(["status" => false, "venue" => $venue]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        if ($venue->delete()) {
            return response()->json(["status" => true, "venue" => $venue]);
        }
        return response()->json(["status" => false, "venue" => $venue]);
    }
}
