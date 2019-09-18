<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Swot;
use Faker\Generator as Faker;

$factory->define(Swot::class, function (Faker $faker) {
    return [
        //
	    'projet_id'=>rand(1,100),
	    'user_id'=>rand(1,30),
	    'synt_op'=>$faker->paragraph(),
	    'synt_men'=>$faker->paragraph(),
	    'synt_forces'=>$faker->paragraph(),
	    'synt_faiblesses'=>$faker->paragraph()
    ];
});
