<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportbilan extends Model
{
    //
	protected $guarded =[];
	//public $timestamps=false;
	protected $table = 'testbilans';
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Mois');
	}

	protected function getNameAttribute(){
		return $this->moi_id . "/" . $this->annee;
	}

	protected function getFrAttribute(){
		$fr1 = $this->attributes['capital']+$this->attributes['apporteurs_acpital_non_appele']+$this->attributes['primes_apport']+$this->attributes['ecarts_reevaluation']+$this->attributes['reserves_indisponibles']+$this->attributes['reserves_libres']+$this->attributes['report_a_nouveau']+$this->attributes['resultat_net_exercice']+$this->attributes['subventions_investissement']
			+$this->attributes['provisions_reglementees']+$this->attributes['emprunts']+$this->attributes['dettes_location_acquisition']+$this->attributes['provisions_financieres_risques_'];
		$fr2 = $this->attributes['frais_developpement']+$this->attributes['brevets']+$this->attributes['fonds_commercial']+$this->attributes['autres_immobilisations_incorporelles']+$this->attributes['terrains']+$this->attributes['batiments']+$this->attributes['amenagements']+$this->attributes['materiel_mobilier']+$this->attributes['materiel_transport']+$this->attributes['avances_acomptes']+$this->attributes['titres_participation']+$this->attributes['autres_immobilisations_financieres'];
		return $fr1 - $fr2;
	}

	protected function getBfrAttribute(){
		$fr1 = $this->attributes['actif_circulant_hao']+$this->attributes['stocks_encours']+$this->attributes['creances_emplois']+$this->attributes['avances_fournisseurs']+$this->attributes['clients']+$this->attributes['autres_creances'];
		$fr2 = $this->attributes['dettes_circulantes_hao']+$this->attributes['clients_avances_recues']+$this->attributes['fournisseurs_exploitation']+$this->attributes['dettes_fiscales']+$this->attributes['autres_dettes'];
		return $fr1 - $fr2;
	}

	protected function getTnAttribute(){
		$fr1 = $this->attributes['titres_placement']+$this->attributes['valeur_encaisser']+$this->attributes['banques_cheques_'];
		$fr2 = $this->attributes['banques_credit_escompte']+$this->attributes['banques_credit_tresorerie'];
		return $fr1 - $fr2;
	}
}
