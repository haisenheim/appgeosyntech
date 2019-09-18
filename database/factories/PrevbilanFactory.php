<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prevbilan;
use Faker\Generator as Faker;

$factory->define(Prevbilan::class, function (Faker $faker) {
    return [
        //
	    'frais_developpement'=>rand(1000,98900) * 1000,
	    'brevets'=>rand(1000,98900) * 1000,
	    'fonds_commercial'=>rand(1000,98900) * 1000,
	    'autres_immobilisations_incorporelles'=>rand(1000,98900) * 1000,
	    'terrains'=>rand(1000,98900) * 1000,
	    'batiments'=>rand(1000,98900) * 1000,
	    'amenagements'=>rand(1000,98900) * 1000,
	    'materiel_mobilier'=>rand(1000,98900) * 1000,
	    'materiel_transport'=>rand(1000,98900) * 1000,
	    'avances_acomptes'=>rand(1000,98900) * 1000,
	    'titres_participation'=>rand(1000,98900) * 1000,
	    'autres_immobilisations_financieres'=>rand(1000,98900) * 1000,
	    'actif_circulant_hao'=>rand(1000,98900) * 1000,
	    'stocks_encours'=>rand(1000,98900) * 1000,
	    'creances_emplois'=>rand(1000,98900) * 1000,
	    'avances_fournisseurs'=>rand(1000,98900) * 1000,
	    'clients'=>rand(1000,98900) * 1000,
	    'autres_creances'=>rand(1000,98900) * 1000,
	    'titres_placement'=>rand(1000,98900) * 1000,
	    'valeur_encaisser'=>rand(1000,98900) * 1000,
	    'banques_cheques_'=>rand(1000,98900) * 1000,
	    'ecart_conversion_actif'=>rand(1000,98900) * 1000,
	    'capital'=>rand(1000,98900) * 1000,
	    'apporteurs_acpital_non_appele'=>rand(1000,98900) * 1000,
	    'primes_apport'=>rand(1000,98900) * 1000,
	    'ecarts_reevaluation'=>rand(1000,98900) * 1000,
	    'reserves_indisponibles'=>rand(1000,98900) * 1000,
	    'reserves_libres'=>rand(1000,98900) * 1000,
	    'report_a_nouveau'=>rand(1000,98900) * 1000,
	    'resultat_net_exercice'=>rand(1000,98900) * 1000,
	    'subventions_investissement'=>rand(1000,98900) * 1000,
	    'provisions_reglementees'=>rand(1000,98900) * 1000,
	    'emprunts'=>rand(1000,98900) * 1000,
	    'dettes_location_acquisition'=>rand(1000,98900) * 1000,
	    'provisions_financieres_risques_'=>rand(1000,98900) * 1000,
	    'dettes_circulantes_hao'=>rand(1000,98900) * 1000,
	    'clients_avances_recues'=>rand(1000,98900) * 1000,
	    'fournisseurs_exploitation'=>rand(1000,98900) * 1000,
	    'dettes_fiscales'=>rand(1000,98900) * 1000,
	    'autres_dettes'=>rand(1000,98900) * 1000,
	    'banques_credit_escompte'=>rand(1000,98900) * 1000,
	    'banques_credit_tresorerie'=>rand(1000,98900) * 1000,
	    'ecart_conversion_passif'=>rand(1000,98900) * 1000,
	    'projet_id'=>rand(10,70),
	    'annee'=>rand(2016,2019),
	    'user_id'=>rand(1,30)
    ];
});
