<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Event;



class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return json_encode($events);
    }
   
    public function create()
    {
        $event = new Event();
        return json_encode($event);
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect('event/create');
    }

    public function show(Event $event)
    {
        //
    }
   
    public function edit(Event $event)
    {
       //return view('/Events/edit',['event' => $event]);
       return json_encode($event);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->all();
        $event = Event::find($event->id);
        $event->fill($data);
        $event->save();

        return json_encode($event);
    }
   
    public function destroy(Event $event)
    {
        //
    }

    public function validateEvent (Event $event)
    {
        $event->approval_status ="approved";
        $event->save();
        return json_encode($event);
    }

    public function showValidatedEvents ()
    {
        $validatedEvents = DB::table('events')->where('approval_status', '=', 'approved')->get();
        return json_encode($validatedEvents);
    }

}