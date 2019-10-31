<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    function user()
    {
        return $this->belongsTo('App\User');
    }
    //TODO Ask Team about relationship with User and UserProfile to confirm cohesion of app
    function application()
    {
        return $this->belongsToMany('App\Application');
    }
}
