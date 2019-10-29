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

    public function store(Request $request)
    {
        // $newRequest = Application::getVolunteerID($request);
        $newApplication = Application::create($request->all());
        return json_encode($newApplication);
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
}
