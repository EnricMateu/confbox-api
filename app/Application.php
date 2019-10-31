<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Application extends Model
{
    static $pending = 0;
    static $approved = 1;
    static $rejected = 2;

    protected $fillable = ['volunteer_id', 'status', 'event_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // static function addVolunteerID($request)
    // {
    //     $newRequest = $request->all();
    //     $newRequest['volunteer_id'] = auth()->id();
    //     return $newRequest;
    // }

}
