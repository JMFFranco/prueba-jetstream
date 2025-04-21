<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return Event::all();
        return Event::where("event_name", "ilike", "%$request->search%")
        ->orderBy("id", "desc")
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = Event::create($request->all());
        return response()->json([
            "status" => true,
            "event" => $event
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json(["status" => true, "" => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        if ($event->update($request->all())) {
            return response()->json(["status" => true, "event" => $event]);
        }
        return response()->json(["status" => false, "event" => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->delete()) {
            return response()->json(["status" => true, "event" => $event]);
        }
        return response()->json(["status" => false, "event" => $event]);
    }
}
