<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TagsProjet;
use Faker\Generator as Faker;

$factory->define(TagsProjet::class, function (Faker $faker) {
    return [
        //
	    'tag_id'=>rand(1,120),
	    'projet_id'=>rand(1,70)
    ];
});
