<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahLocation::class, function (Faker $faker) {
    return [
        'city_id' => mt_rand(1,44),
        'address' => $faker->address,
        'address_details' => $faker->address,
        'google_map_url' => $faker->url
    ];
});
