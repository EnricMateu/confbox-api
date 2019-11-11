<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
return [

    'user_id'=> null ,
    'profile_name'=> $faker ->name ,
    'first_name'=> $faker -> firstName,
    'last_name'=> $faker ->lastName ,
    'street_address'=> $faker ->streetAddress ,
    'city'=> $faker ->city ,
    'country'=> $faker ->country ,
    'postcode'=> $faker ->randomNumber(5),
    'phone'=> $faker ->phoneNumber ,
    'linkedin_url'=> $faker ->url,
    'user_type' => 'volunteer'
];
});
