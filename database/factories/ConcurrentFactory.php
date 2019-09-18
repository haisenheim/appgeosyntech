<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Concurrent;
use Faker\Generator as Faker;

$factory->define(Concurrent::class, function (Faker $faker) {
    return [
        //
	    'name'=>$faker->company,
	    'quoi'=>$faker->linuxProcessor,
	    'ou'=>$faker->city,
	    'quand'=>$faker->dateTime(),
	    'combien'=>$faker->buildingNumber,
	    'pourquoi'=>$faker->text(),
	    'ca'=>rand(1000,9890) * 1500,
	    'cv'=>rand(1000,3600) * 500,
	    'cf'=>rand(1000,4600) * 900,
	    'salaires'=>rand(1000,5600) * 900,
	    'projet_id'=>rand(1,70)


    ];
});
