<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
        'country' => $faker->country,
        'city' => $faker->city,
        'event_url' => $faker->url(),
        'approval_status' => 'not_approved',
        'title' => $faker->sentence(5),
        'topic' => $faker->word,
        'description' => $faker->paragraph(5),
    ];
});
//TODO CLEAN UP FACTORY STATE BELOW
$factory->state(Event::class, 'with_company_id', [])
    ->afterCreatingState(Event::class, 'with_company_id', function ($event, $faker) {
        factory(Company::class)->create([
            'organizing_company_id' => $event->organizing_company_id,
        ]);
    });

/*class EventFactory(){



}*/
