<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'date_from'=> $faker->date,
        'date_to'=> $faker->date,
        'organizing_company_id'=> null,
        'country'=> $faker->country,
        'city'=> $faker->city,
        'event_url'=> $faker->url,
        'approval_status'=> 0,
        'title'=> $faker->title,
        'topic'=> $faker->name,
        'description'=> Str::random(10),
    ];
});
