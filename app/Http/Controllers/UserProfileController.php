<?php

namespace App\Http\Controllers;

use App\UserProfile;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function rules()
    {
        return [

            'profile_name' => 'required',
            'first_name' => 'required',
            'last_name' =>'required' ,
            'street_address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'linkedin_url' => 'required',

        ];
    }
    public function index()
    {
        return UserProfile::all();
    }

    public function show(UserProfile $userprofile)
    {
        return $userprofile;
    }

    public function store(Request $request,UserProfile $userProfile)
    {
        $userProfile = [
            'user_id' => auth()->id(),
            'profile_name' => $request->profile_name,
            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
            'street_address' => $request->street_adress,
            'city' => $request->city,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'linkedin_url' => $request->linkedin_url,
            'user_type' => 'volunteer'
        ];


        $response = UserProfile::create($userProfile);
        return $response;

    }

    public function update(Request $request,UserProfile $userprofile)
    {
        $userprofile->update($request->all());
        return response()->json($userprofile, 200);
    }

    public function delete(Request $request,UserProfile $userprofile)
    {
        $userprofile->delete();

        return response()->json(null, 204);
    }
}
