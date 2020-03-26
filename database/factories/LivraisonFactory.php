<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Livraison::class, function (Faker $faker) {
    return [
        //
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
	    'user_id'=>rand(2,7),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2016,2019),
	    'montant'=>rand(170,2000) * 1000,
    ];
});
