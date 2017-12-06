<?php

use Faker\Generator as Faker;
use App\Business;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'activated' => true
    ];
});
