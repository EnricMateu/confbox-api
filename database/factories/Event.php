<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'date_from' => $faker->date,
        'date_to' => $faker->date,
        'country'=>$faker->country,
        'city'=>$faker->city,
        'event_url'=>$faker->url,
        'approval_status'=>$faker->string("not approved"),
        'title'=>$faker->text,
        'topic'=>$faker->text,
        'description'=>$faker->text,
       ];
});
