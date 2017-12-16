<?php

use Faker\Generator as Faker;
use App\Client;
use App\Business;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'business_id' => function () {
            return factory(Business::class)->create()->id;
        },
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->randomNumber(8)
    ];
});
