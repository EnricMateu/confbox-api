<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'date_from' => $faker->date,
        'date_to' => $faker->date,
        'country'=>$faker->country,
        'city'=>$faker->city,
        'event_url'=>$faker->url,
        'approval_status'=>$faker->Realtext,
        'title'=>$faker->Realtext,
        'topic'=>$faker->Realtext,
        'description'=>$faker->Realtext,
       ];
});
