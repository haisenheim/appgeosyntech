<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Prime::class, function (Faker $faker) {

    return [
        //

	    'montant'=>rand(30,750) * 1000,


    ];
});
