<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        //'company_id' => null,
        'company_name' => $faker->company,
        'contact_name' => $faker->name(55),
        'contact_email' => $faker->unique->companyEmail,
        'contact_phone' => $faker->unique->phoneNumber,
        'company_url' => $faker->url,
    ];
});
