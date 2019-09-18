<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resultat;
use Faker\Generator as Faker;

$factory->define(Resultat::class, function (Faker $faker) {
    return [
        //
	    'projet_id'=>rand(10,100),
	    'annee'=>rand(2016,2019),
	    'ca'=>rand(1000,98900) * 3000,
	    'pi'=>rand(1000,98900) * 1000,
	    'ps'=>rand(1000,98900) * 1000,
	    'sp'=>rand(1000,98900) * 1000,
	    'ape'=>rand(1000,98900) * 1000,
	    'cv'=>rand(1000,98900) * 1000,
	    'cf'=>rand(1000,98900) * 1000,
	    'salaires'=>rand(1000,98900) * 1000,
	    'taxes'=>rand(1000,98900) * 1000,
	    'dap'=>rand(1000,98900) * 1000,
	    'pf'=>rand(1000,98900) * 1000,
	    'cfi'=>rand(1000,98900) * 1000,
	    'pe'=>rand(1000,98900) * 1000,
	    'ce'=>rand(1000,98900) * 1000,
	    'participations'=>rand(1000,98900) * 1000,
	    'impots'=>rand(1000,98900) * 1000,
	    'token'=>sha1(rand(1,9999)),
	    'moi_id'=>rand(1,12)
    ];
});
