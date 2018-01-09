<?php

use App\Business;
use App\Client;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'business_id' => function () {
            return factory(Business::class)->create()->id;
        },
        'email'        => $faker->unique()->safeEmail,
        'phone_number' => $faker->randomNumber(8),
    ];
});
