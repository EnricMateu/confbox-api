<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['firstname', 'lastname', 'street_address', 'city', 'country', 'postcode', 'email', 'phone', 'linkedin_url', 'volunteer_id', 'event_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    static function addVolunteerID($request)
    {
        $newRequest = $request->all();
        $newRequest['volunteer_id'] = auth()->id();
        return $newRequest;
    }
}
