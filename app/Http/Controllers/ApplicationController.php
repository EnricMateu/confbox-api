<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return json_encode($applications);
    }

    public function create()
    {
        $application = new Application();
        return view('application.create', compact('application'));
    }

    public function store(Request $request, $event_id)
    {
        $application = [
            'state'=> Application::$pending,
            'event_id'=> $event_id,
            'user_id'=> auth()->id(),
        ];

        $response = Application::create($application);
        // return $response;
    }

    public function show(Application $application)
    {
        //
    }

    public function edit(Application $application)
    {
        return view('application.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $application->update($request->all());
        dd($application);
        return ('/application');
    }

    public function destroy(Application $application)
    {
        $application->destroy($application->id);
        return redirect('/application');
    }

    public function getEventId(Request $request, $event_id)
    {
    }
}
