<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahSocials::class, function (Faker $faker) {
    return [
        'phone' => '05'.mt_rand(10000000,99999999),
        'instagram' => $faker->url,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'snapchat' => $faker->url,
    ];
});
