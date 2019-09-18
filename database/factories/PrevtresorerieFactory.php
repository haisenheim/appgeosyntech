<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prevtresorerie;
use Faker\Generator as Faker;

$factory->define(Prevtresorerie::class, function (Faker $faker) {
    return [
        //
	    'projet_id'=>rand(7,70),
	    'capacite_autofinancement'=>rand(1000,99800) * 1000,
	    'actif_circulant_hao'=>rand(1000,99800) * 1000,
	    'variation_stocks'=>rand(1000,99800) * 1000,
	    'variation_creances'=>rand(1000,99800) * 1000,
	    'variation_passif_circulant'=>rand(1000,99800) * 1000,
	    'decaissements_acquisitions_incorporelles'=>rand(1000,99800) * 1000,
	    'decaissements_acquisitions_corporelles'=>rand(1000,99800) * 1000,
	    'decaissements_acquisitions_financieres'=>rand(1000,99800) * 1000,
	    'cessions_immo_incoporelles_corporelles'=>rand(1000,99800) * 1000,
	    'cessions_immo_financieres'=>rand(1000,99800) * 1000,
	    'augmentation_capital_apports_nouveaux'=>rand(1000,99800) * 1000,
	    'subventions_investissement_recues'=>rand(1000,99800) * 1000,
	    'prelevements_capital'=>rand(1000,99800) * 1000,
	    'distribution_dividendes'=>rand(1000,99800) * 1000,
	    'emprunts'=>rand(1000,99800) * 1000,
	    'autres_dettes_financieres'=>rand(1000,99800) * 1000,
	    'remboursement_emprunts'=>rand(1000,99800) * 1000,
	    'annee'=>rand(2016,2019)

    ];
});
