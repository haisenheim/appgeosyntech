<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Projet;
use Faker\Generator as Faker;

$factory->define(\App\Models\Formation::class, function (Faker $faker) {

	    $imgs = ['photo1.png','photo2.png','pole-formation.png','gadgets.png','mini_slide1.png','mini_slide2.png','mini_slide3.png'];
    return [
        //

	    'name'=>'Formation '.rand(1,1333),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2018,2020),
	    'owner_id'=>rand(50,55),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
	    'imageUri'=>$imgs[rand(0,6)],
	    'description'=>$faker->text(),
	    'chaire_obac'=>rand(0,1),
	    'interne'=>rand(0,1),
	    'active'=>rand(0,1),

    ];
});
