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
        // return view('application.create', compact('application'));
    }

    public function store(Request $request, $event_id)
    {
        $request->merge([
            'status'=> Application::$pending,
            'event_id'=> $event_id,
            'user_id'=> auth()->id(),
        ]);

        $response = Application::create($request->all());
        return $response;
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
        return redirect('/application');
    }

    public function destroy(Application $application)
    {
        $application->destroy($application->id);
        return redirect('/application');
    }

    public function changeApplicationStatus(Request $request, $application_id)
    {
        $application = Application::find($application_id);
        
        if(!$request->approved)
        {
            $application->status = Application::$rejected;
            $application->update();
            return;
        }
        $application->status = Application::$approved;
        $application->update();
        return;
    }
    
}
