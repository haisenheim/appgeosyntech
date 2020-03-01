<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    $pl = rand(2,10) * 10000;
	return [
        //
	    'name'=>$faker->sentence(2),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
	    'description'=>$faker->text(100),
	    'duree'=>rand(2,30),
	    'prix_ligne'=>$pl,
	    'prix_presentiel'=>$pl * rand(2,9) + rand(2,11)*100,
	    'minimum'=>rand(7,14) * 5,
		'free'=>rand(0,1)
    ];
});
