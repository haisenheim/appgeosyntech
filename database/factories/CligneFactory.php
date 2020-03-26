<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Cligne::class, function (Faker $faker) {
	//$unixTimestamp = '1561467200';
    $m= rand(1,100);
	$debut = $faker->dateTimeBetween('+'.$m.' days','+3 years');
	$deb = $faker->dateTimeBetween('+'.$m.' days','+3 years');
	$fin = $debut->add(new DateInterval('P'.rand(200,700).'D'));;
	//date('Y-m-d', strtotime($debut. ' + 2 days'));

	return [
        //

	    'poste_id'=>rand(1,10),
	    'secteur_id'=>rand(1,9) ,
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),

	    'quantity'=>rand(1,7),
	    'debut'=>$deb,
	    'fin'=>$fin,
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2019,2020)
    ];
});
