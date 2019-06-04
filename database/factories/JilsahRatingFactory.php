<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahRating::class, function (Faker $faker) {
    return [
        'rating' => mt_rand(1,5),
        'comment' => $faker->text
    ];
});
