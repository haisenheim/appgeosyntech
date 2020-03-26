<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Cligne::class, function (Faker $faker) {
	$unixTimestamp = '1561467200';
    $m= rand(1,12);
	$debut = $faker->dateTimeBetween(time(),'+'.$m.' months');
	$marge = rand(1,5);
	return [
        //

	    'poste_id'=>rand(1,10),
	    'secteur_id'=>rand(1,9) ,
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),

	    'quantity'=>rand(1,7),
	    'debut'=>$debut,
	    'fin'=>$faker->dateTimeBetween($debut,'+3 years'),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2019,2020)
    ];
});
