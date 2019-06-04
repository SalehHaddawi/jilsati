<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahTypes::class, function (Faker $faker) {
    $types = ['جلسات طاولة','جلسات ارضية'];

    return [
        'name' => $types[mt_rand(0,sizeof($types)-1)]
    ];
});
