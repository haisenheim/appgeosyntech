<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Projet;
use Faker\Generator as Faker;

$factory->define(Projet::class, function (Faker $faker) {
	$tep = rand(1,4);
	    $imgs = ['photo1.png','photo2.png','photo3.jpg','photo4.jpg','porf-1.jpg','porf-2.jpg','porf-3.jpg','porf-4.jpg','porf-5.jpg','porf-6.jpg','porf-7.jpg'];
    return [
        //
	    'code'=>'code '.rand(1,1000),
	    'name'=>'Projet '.rand(1,1333),
	    'moi_id'=>rand(1,12),
	    'annee'=>rand(2016,2019),
	    'owner_id'=>rand(3,24),
	    'expert_id'=>rand(3,10),
	    'montant'=>rand(200,4000) * 10000,
	    'type_id'=>rand(1,3),
	    'representant'=>$faker->lastName .'  '.$faker->firstName,
	    'address'=>$faker->address,
	    'phone'=>$faker->phoneNumber,
	    'email'=>$faker->safeEmail,
	    'active'=>rand(0,1),
	    'public'=>rand(0,1),
	    'description_modele_economique'=>$faker->paragraph(3),
	    'synthese_diagnostic_interne'=>$faker->paragraph(3),
	    'synthese_diagnostic_externe'=>$faker->paragraph(3),
	    'synthese_diagnostic_strategique'=>$faker->paragraph(),
	    'etude_faisabilite'=>$faker->paragraph(4),
	    'objectifs_courts'=>$faker->paragraph(2),
	    'objectifs_moyens'=>$faker->paragraph(2),
	    'objectifs_longs'=>$faker->paragraph(2),
	    'etape'=>rand(1,4),
	    'validated_step'=>$tep - rand(0,1),
	    'synthese_plan_developpement'=>$faker->paragraph(3),
	    'imageUri'=>$imgs[rand(0,10)],
	    'tinvestissement_id'=>rand(1,6),
	    'variante_id'=>rand(1,3),
	    'ville_id'=>rand(1,10),
	    'capital'=>rand(0,1),
	    'token'=>sha1($faker->randomAscii . rand(1000,99999)),
	    'plan_id'=>rand(1,20),
	    'montant_investissement'=>rand(1000,9999) * 1000,
	    'bfr'=>rand(1000,6900)* 500


    ];
});
