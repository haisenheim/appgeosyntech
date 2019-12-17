<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fincapitalsocial extends Model
{
    //
	protected $guarded = [];
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}
	
	public function repartcapitalsocials(){
		return $this->hasMany('App\Models\Repartcapitalsocial');
	}



	public function getMtcapitalAttribute(){
		return $this->vna * $this->nba_aoc;
	}



	//---------------------------Montant des capitaux propores --------------------------------------
	public function getCapitaux_propresAttribute(){
		return $this->resultat_net + $this->report + $this->reserves + $this->getMtcapitalAttribute();
	}

	//------------------------------- Valeur de l'action avant emission ------------------------------
	public function getVa_aocAttribute(){
		return $this->nba_aoc?$this->getCapitaux_propresAttribute()/$this->nba_aoc:0;
	}

	//------------------------------Prime d'emission -----------------------------------------------------
	public function getPrime_emiAttribute(){
		return $this->prix_emi - $this->vna;
	}

	//------------------------------Nombre d'actions nouvellement emises ------------------------------
	public function getNba_neAttribute(){
		return $this->vna? $this->mt_levee/$this->vna:0;
	}

	//--------------------------Prime d'emission totale --------------------------------------------
	public function getPrime_emi_totaleAttribute(){
		return $this->getPrime_emiAttribute() * $this->getNba_neAttribute();
	}

	//----------------------------Nombre d'action disponible apres emission -------------------------
	public function getNba_aeAttribute(){
		return $this->nba_aoc + $this->getNba_neAttribute();
	}

	//----------------------------Nouveau montant du capital -----------------------------------------
	public function getNew_mt_capitalAttribute(){
		return $this->vna * $this->getNba_aeAttribute(); // Est-ce que la valeur nominale n'a pas evolue entre temps????
	}

	//--------------------------Nouveau montant des capitaux propres -------------------------------------------------
	public function getNew_mt_capitaux_propresAttribute(){
		return $this->getNew_mt_capitalAttribute() + $this->resultat_net + $this->reserves + $this->report;
	}

	//-------------------------Valeur de l'action apres emission ---------------------------------------------------
	public function getVa_aeAttribute(){
		return $this->getNba_aeAttribute()?$this->getNew_mt_capitaux_propresAttribute()/$this->getNba_aeAttribute():0;
	}

	//---------------------------Valeur du droit preferentiel de souscription --------------------------------------
	public function getVa_dpsAttribute(){
		return $this->getVa_aocAttribute() - $this->getVa_aeAttribute();
	}

	// ------------------------- Nombre de Droit de souscription pour obtenir une nouvelle action-----------------------
	public function getNb_dsAttribute(){
		return $this->nba_aoc?$this->getNba_neAttribute()/$this->nba_aoc:0;
	}

	//-------------------------Capital appele non verse ----------------------------------------------------------------
	public function getCapital_appeleAttribute(){
		return $this->taux_capital_appele * $this->getNba_neAttribute() * $this->vna;
	}

	//---------------------Capital non appele --------------------------------------------------------------------------
	public function getCapital_non_appeleAttribute(){
		return $this->vna * $this->getNba_neAttribute() - $this->getCapital_appeleAttribute();
	}

	//----------------------Cout moyen pondere du capital --------------------------------------------------------------
	public function getCmpcAttribute(){
		return $this->taux_rent_exige_act * ($this->getCapitaux_propresAttribute()/($this->getCapitaux_propresAttribute()+$this->mt_dettes_fin)) + ($this->cout_endettement*(1-$this->taux_imposition)) * ($this->mt_dettes_fin/($this->mt_dettes_fin+$this->getCapitaux_propresAttribute()));
	}

	//----------------Calcul du besoin en fond de roulement en jour du chiffre d'affaires----------------d
	public function getBfrjcaAttribute(){
		$projet = Projet::find($this->projet_id);
		$earlie = Earlie::find($this->earlie_id);
		$inf = Infrastructure::find($this->infrastructure_id);
		if($projet){
			return $projet->prevresultats?round($projet->bfr * 360 /$projet->prevresultats->first()->ca1,2):0;
		}
		if($earlie){
			return $earlie->prevresultats?round($earlie->bfr * 360 /$earlie->prevresultats->first()->ca1,2):0;
		}
		if($inf){
			return $inf->prevresultats?round($inf->bfr * 360 /$inf->prevresultats->first()->ca1,2):0;
		}

		return 0;

	}

	//--------------------Calcul du besoin en fonds de roulement en pourcentage du CA ----------------
	public function getBfrpcaAttribute(){
		return round($this->getBfrjcaAttribute()/360,2);
	}





	//--------------------------------Calcul du montant total des investissements --------------------

	/*public function getMttiAttribute(){
		return $this->mt_invest + $this->bfr;
	}*/

	//--------------------------------Calcul de la valeur de l'action apres emission ------------------

	public function getVaaeAttribute(){
		return  $this->nba_aoc?round($this->mt_capitaux_propres/$this->nba_aoc,2):0;
	}

	//----------------------------Calcul du nombre d'actions disponibles apres emission de nouvelles actions--------
	public function getNbadaenaAttribute(){
		return $this->nba_aoc + $this->nba_ne;
	}

	public  function getFluxnormatiftresoAttribute(){


		if($this->projet_id){
			$projet = Projet::find($this->projet_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $prv->fluxtresodispo * (1+ $this->tci_flux_dvd_non_actu);
		}

		if($this->earlie_id){
			$projet = Earlie::find($this->earlie_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $prv->fluxtresodispo * (1+ $this->tci_flux_dvd_non_actu);
		}

		if($this->infrastructure_id){
			$projet = Infrastructure::find($this->infrastructure_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $prv->fluxtresodispo * (1+ $this->tci_flux_dvd_non_actu);
		}

		return -1;
	}



	public function getFluxnormatifactutresoAttribute(){


		if($this->projet_id){
			$projet = Projet::find($this->projet_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $this->getFluxnormatiftresoAttribute() * $prv->factActu;
		}

		if($this->earlie_id){
			$projet = Earlie::find($this->earlie_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $this->getFluxnormatiftresoAttribute() * $prv->factActu;
		}
		if($this->infrastructure_id){
			$projet = Infrastructure::find($this->infrastructure_id);
			$prv = $projet->prevresultats->sortBy('annee')->last();
			return $this->getFluxnormatiftresoAttribute() * $prv->factActu;
		}

		return -1;
	}


	public function getValeurtermfluxtresoAttribute(){
		return ($this->getCmpcAttribute() - $this->tci_flux_dvd_non_actu)?round($this->getFluxnormatifactutresoAttribute()/($this->getCmpcAttribute() - $this->tci_flux_dvd_non_actu),0):0;
	}

	protected function _getFluxnormatifdvd(){
		return $this->_getMt;
	}


	//-----------------------------Calcul de la valeur de l'entreprise selon la methode DCF -----------------------------
	public function _getVedcf(){
		if($this->projet_id){
			$projet = Projet::find($this->projet_id);
			$s=0;
			foreach($projet->prevresultats as $prv){
				$s=$s+$prv->ftda;
			}
			return $s+ $this->getValeurtermfluxtresoAttribute();
		}

		if($this->earlie_id){
			$projet = Earlie::find($this->earlie_id);
			$s=0;
			foreach($projet->prevresultats as $prv){
				$s=$s+$prv->ftda;
			}
			return $s+ $this->getValeurtermfluxtresoAttribute();
		}

		if($this->infrastructure_id){
			$projet = Infrastructure::find($this->infrastructure_id);
			$s=0;
			foreach($projet->prevresultats as $prv){
				$s=$s+$prv->ftda;
			}
			return $s+ $this->getValeurtermfluxtresoAttribute();
		}


		return -1;
	}

	//---------------------------Calcul du cours de l'action apres emission ----------------------------------------------
	public function getCoursactionapeAttribute(){
		return $this->nba_ne ? round($this->mt_capitaux_propres / $this->nba_ne,2) : 0;
	}



	//-------------------------------- Calcul du nombre de droit de souscription -----------------------------------------------
	public function getNbdsAttribute(){

		return $this->nba_aoc?round($this->nba_ne/$this->nba_aoc,2):0;
	}

	//--------------------------- Calcul de la Valeur des droits préférentiels de souscription -------------------------------
	public function getValdpsAttribute(){
		return $this->nba_aoc?round(($this->vna - $this->prix_pref_emis_na)/(1+($this->nba_ne/$this->nba_aoc)),2):0;
	}

	//---------------------------- Calcul de la valeur comptable de l'action -------------------------------------------
	public function getValcaAttribute(){
		return $this->getNbadaenaAttribute()?round(($this->getVaaeAttribute() - ($this->getNbdsAttribute() * $this->getValdpsAttribute()))/$this->getNbadaenaAttribute(),2):0;
	}

	//------------------------- Calcul du taux de rendement de l'action ------------------------------------------------
	public function getTauxraAttribute(){

		return $this->getValcaAttribute()?round($this->mt_dernier_dvd_brut_action/$this->getValcaAttribute(),2):0;
	}

	//------------------------------------- Taux de Rentabilité attendue de l'action --------------------------------------------------
	public function getTauxraaAttribute(){
		return $this->taux_interet_sans_risque + ($this->beta_actif * ($this->taux_rent_exige_act - $this->taux_interet_sans_risque));
	}




}
