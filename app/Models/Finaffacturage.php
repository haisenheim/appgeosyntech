<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finaffacturage extends Model
{
    //
	protected  $guarded = [];
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}

	public function dossier(){

		if($this->projet_id){
			return Projet::find($this->projet_id);
		}
		if($this->earlie_id){
			return Earlie::find($this->earlie_id);
		}
		if($this->infrastructure_id){
			return Infrastructure::find($this->infrastructure_id);
		}
		return null;
	}

	//------------------- Calcul du montant de l'escompte ---------------------------------------------------------------
	public function getMtEscompteAttribute(){
		return $this->mt_affacturage * $this->taux_affacturage/100 * $this->nb_jours/360;
	}

	//-------------------- Calcul de la commission d'endossement --------------------------------------------------------
	public function getComEndossementAttribute(){
		return $this->mt_affacturage * $this->taux_com_endos/100 * $this->nb_jours;
	}

	//------------------- Calcul des frais de manipulation --------------------------------------------------------------
	public function getTotalFraisManipAttribute(){
		return $this->frais_manipulation * $this->nb_effets;
	}

	//-------------------- Calcul de la commission d'acceptation --------------------------------------------------------
	public function getTotalComAcceptationAttribute(){
		return $this->nb_effets * $this->com_acception;
	}

	//------------------- Calcul d'avis de sort -------------------------------------------------------------------------
	public function getTotalComAvisAttribute(){
		return $this->nb_effets * $this->com_avis;
	}

	//----------------- Calcul de la somme des commissions -------------------------------------------------------------
	public function getSommeComAttribute(){
		return $this->getComEndossementAttribute() + $this->getTotalFraisManipAttribute() + $this->getTotalComAcceptationAttribute() + $this->getTotalComAvisAttribute();
	}

	//---------------------- Calcul du montant de la taxe sur la valeur ajoutee -----------------------------------------------------
	public function getMtTvaAttribute(){
		return ($this->getTotalComAvisAttribute() + $this->getTotalComAcceptationAttribute()+$this->getTotalFraisManipAttribute())* $this->taux_tva/100;
	}

	//---------------------------- Calcul du montant du centime additionnel --------------------------------------------------------
	public function getMtCentAddAttribute(){
		return $this->getMtTvaAttribute() * $this->taux_centime/100;
	}

	//---------------------- Calcul du montant ajuste de la tva --------------------------------------------------------------------
	public function getMtAjustTvaAttribute(){
		return $this->getMtTvaAttribute() + $this->getMtCentAddAttribute();
	}

	//------------------ Calcul du montant des agios ----------------------------------------------------------------------------------
	public function getMtAgiosAttribute(){
		return $this->getMtEscompteAttribute() + $this->getSommeComAttribute() + $this->getMtAjustTvaAttribute();
	}

}
