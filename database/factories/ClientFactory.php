<?php

use Faker\Generator as Faker;
use App\Client;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->randomNumber(8)
    ];
});
