<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\JilsahOptions::class, function (Faker $faker) {
    $options = ['مكيفة','العاب فيديو','فرفيرة','بلياردو','تنس طاولة','مكسرات','كافيه','مطعم','العاب طاولة','العاب ورقية','منطقة للمدخنين'];

    return [
        'name' => $options[mt_rand(0,sizeof($options)-1)]
    ];
});
