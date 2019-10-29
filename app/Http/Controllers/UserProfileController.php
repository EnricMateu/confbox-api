<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $applications = UserProfile::all()->where('user_id', auth()->id());
        return view('UserProfile.list', compact('userprofiles'));
    }

    public function create()
    {
        $application = new UserProfile();
        return view('UserProfile.create', compact('UserProfile'));
    }

    public function store(Request $request)
    {
        $newRequest = UserProfile::getVolunteerID($request);
        UserProfile::create($newRequest);

        // Mail::to(auth()->email->email)->send(new ReserveConfirmation($reserva));
        return view('UserProfile.sent');
    }

    public function show(UserProfile $application)
    {
        //
    }

    public function edit(UserProfile $application)
    {
        return view('UserProfile.edit', compact('UserProfile'));
    }

    public function update(Request $request, UserProfile $application)
    {
        $application->update($request->all());
        return redirect('/UserProfile');
    }

    public function destroy(UserProfile $application)
    {
        $application->destroy($application->id);
        return redirect('/UserProfile');
    }
}
