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
}
