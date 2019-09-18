<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Segment;
use Faker\Generator as Faker;

$factory->define(Segment::class, function (Faker $faker) {
    return [
        //
	    'projet_id'=>rand(4,70),
	    'name'=>$faker->company,
	    'quoi'=>$faker->linuxProcessor,
	    'ou'=>$faker->city,
	    'quand'=>$faker->dateTime(),
	    'combien'=>$faker->buildingNumber,
	    'pourquoi'=>$faker->text(),
    ];
});
