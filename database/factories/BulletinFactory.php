<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Bulletin::class, function (Faker $faker) {
    return [
        'name'=>rand(1000,9999),
	    'annee'=>rand(2018,2020),
	    'moi_id'=>rand(1,12),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),



    ];
});
