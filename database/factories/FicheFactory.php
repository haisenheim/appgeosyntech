<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Fiche::class, function (Faker $faker) {
    return [
        //
		'name' => rand(1000,9999),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2018,2020),
	    'user_id'=>rand(50,55),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
    ];
});
