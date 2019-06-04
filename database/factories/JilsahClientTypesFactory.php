<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\JilsahClientTypes;
use Faker\Generator as Faker;

$factory->define(JilsahClientTypes::class, function (Faker $faker) {

    $clientTypes = ['عائلات','شباب','سيدات'];

    return [
        'name' => $clientTypes[mt_rand(0,sizeof($clientTypes)-1)]
    ];
});
