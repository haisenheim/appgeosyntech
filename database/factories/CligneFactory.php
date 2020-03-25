<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Cligne::class, function (Faker $faker) {
	$unixTimestamp = '1561467200';
    return [
        //
	    'poste_id'=>rand(1,10),
	    'secteur_id'=>rand(1,9) ,
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),

	    'quantity'=>rand(1,7),
	    'debut'=>$faker->dateTimeBetween($unixTimestamp,'now'),
	    'fin'=>$faker->dateTimeBetween($unixTimestamp,'+3 years'),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2016,2019)
    ];
});
