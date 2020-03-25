<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Projet;
use Faker\Generator as Faker;

$factory->define(\App\Models\Commande::class, function (Faker $faker) {


    return [
        //
	    'name'=>rand(1,1333).'/20',
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2018,2020),
	    'client_id'=>rand(1,4),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
    ];
});
