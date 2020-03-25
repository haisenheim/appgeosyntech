<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Pointage::class, function (Faker $faker) {
    $val1 = rand(1485154065,1515000000);


	return [
        //
		'moi_id'=>rand(1,12),
		'annee'=>rand(2010,2020),
		'debut'=>$faker->dateTimeBetween($val1,'now'),
		'fin'=>$faker->dateTimeBetween($val1,'+'. rand(2,9) . 'hours'),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),



    ];
});
