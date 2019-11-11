<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
     protected $fillable = ['user_id','profile_name','first_name', 'last_name', 'street_address', 'city', 'country', 'postcode',
         'phone', 'linkedin_url', 'user_type'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function application()
    {
        return $this->belongsToMany(Application::class);
    }
}
