<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Event;
use App\Events;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::getAllEvents()->where('country', 'Spain');
        return json_encode($events);
    }

    public function create()
    {
        $event = new Event();
        return response()->json($event, 200);
    }

    public function store(Request $request)
    {
        return Event::create($request->all());
        return redirect()->action('EventController@showValidatedEvents');
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
       //return view('/Events/edit',['event' => $event]);
       //return json_encode($event);
       return response()->json($event, 200);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->all();
        $event = Event::find($event->id);
        $event->fill($data);
        $event->save();

        //return json_encode($event);
        return response()->json($event, 200);
    }

    public function destroy(Event $event)
    {
        //
    }

    public function validateEvent(Event $event)
    {
        $event->approval_status = Event::$approved;
        $event->update();
        return json_encode($event);
    }

    public function showValidatedEvents()
    {
        $events = new Events();
        $validatedEvents = $events->getValidatedEvents();
        return response()->json($validatedEvents, 200);
    }

}
