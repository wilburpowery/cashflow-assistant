<?php

use App\Business;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text,
        'activated'   => true,
    ];
});
