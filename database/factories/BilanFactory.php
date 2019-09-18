<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bilan;
use Faker\Generator as Faker;

$factory->define(Bilan::class, function (Faker $faker) {
    return [
        //
	    'ress_durable'=>rand(1000,99800) * 1000,
	    'actifs_immo'=>rand(1000,99800) * 1000,
	    'creances'=>rand(1000,99800) * 1000,
	    'stocks'=>rand(1000,99800) * 1000,
	    'dettes'=>rand(1000,99800) * 1000,
	    'user_id'=>rand(3,20),
	    'projet_id'=>rand(2,70),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2016,2019)
    ];
});
