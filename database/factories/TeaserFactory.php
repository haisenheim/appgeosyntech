<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Teaser;
use Faker\Generator as Faker;

$factory->define(Teaser::class, function (Faker $faker) {
    return [
        //
	    'projet_id'=>rand(2,90),
	    'contexte'=>$faker->paragraph(),
	    'problematique'=>$faker->paragraph(2),
	    'marche'=>$faker->paragraph,
	    'strategie'=>$faker->paragraph,
	    'chiffres'=>$faker->linuxProcessor.' :'.$faker->randomNumber(5).', '.$faker->colorName.' : '.$faker->randomNumber(4),
	    'focus_realisations'=>$faker->paragraph,
	    'user_id'=>rand(2,70)

    ];
});
