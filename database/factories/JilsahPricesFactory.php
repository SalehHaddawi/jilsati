<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahPrices::class, function (Faker $faker) {
    return [
        'price_per_jilsah' => mt_rand(0,1),
        'school_week' => mt_rand(1,100),
        'school_weekend' => mt_rand(1,100),
        'vacation_week' => mt_rand(1,100),
        'vacation_weekend' => mt_rand(1,100),
        'eid' => mt_rand(1,100),
        'ramadan' => mt_rand(1,100)
    ];
});
