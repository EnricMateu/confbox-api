<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function rules()
    {
        return [
            'city_id' => 'required|integer|exists:cities,id',
            'address' => 'required'
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

    public function store(Request $request,UserProfile $userprofile)
    {
        return UserProfile::create($request->all());
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
