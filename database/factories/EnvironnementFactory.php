<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Environnement;
use Faker\Generator as Faker;

$factory->define(Environnement::class, function (Faker $faker) {
    return [
        //
	    'pol_secto_op'=>$faker->text(),
	    'pol_secto_men'=>$faker->text(),
	    'cadre_macroeco_op'=>$faker->text(),
	    'cadre_macroeco_men'=>$faker->text(),
	    'asp_sociocult_op'=>$faker->text(),
	    'asp_sociocult_men'=>$faker->text(),
	    'env_tech_op'=>$faker->text(),
	    'env_tech_men'=>$faker->text(),
	    'impact_env_op'=>$faker->text(),
	    'impact_env_men'=>$faker->text(),
	    'cadre_regl_op'=>$faker->text(),
	    'cadre_regl_men'=>$faker->text(),
	    'pouv_nego_frn_op'=>$faker->text(),
	    'pouv_nego_frn_men'=>$faker->text(),
	    'pouv_nego_cli_op'=>$faker->text(),
	    'pouv_nego_cli_men'=>$faker->text(),
	    'perf_prdt_subst_op'=>$faker->text(),
	    'perf_prdt_subst_men'=>$faker->text(),
	    'intensite_concu_op'=>$faker->text(),
	    'intensite_concu_men'=>$faker->text(),
	    'projet_id'=>rand(1,100),
	    'user_id'=>rand(2,50)
    ];
});
