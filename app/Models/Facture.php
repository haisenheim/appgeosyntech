<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Facture extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['jour'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}



	public function paiements(){
		return $this->hasMany('App\Models\Paiement');
	}

	public function getMontantTvaAttribute(){
		$jalon = $this->jalon;
		$val = 0;
		if($jalon->pourcentage >= 50){
			if($this->avec_tva){
				return $this->getMontantAttribute() * 19.25 / 100;
		 	}

			return 0;
		}

		return 0;
	}


	public function getJalonsPrecedentsAttribute(){
		$ordre = $this->jalon->ordre;
		$montant = $this->getMontantAttribute();
		if($ordre <= 1){
			return 0;
		}else{

			$jalons = $this->proforma->jalons->where('ordre','<',$ordre);

			$somme = $jalons->reduce(function($carry, $item){
				return $carry + $item->montant;
			});

			return $somme;
		}
	}

	public function getMontantAirAttribute(){

		return $this->getMontantJalonAttribute() * 2.2 / 100;

	}



	public function getMontantJalonAttribute(){
		return $this->jalon->pourcentage * $this->getMontantAttribute() / 100;
	}

	public function getNetAttribute(){
		return $this->getMontantAirAttribute() + $this->getMontantTvaAttribute() + $this->getMontantJalonAttribute();
	}


	public function jalon(){
		return $this->belongsTo('App\Models\Jalon');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function proforma(){
		return $this->belongsTo('App\Models\Proforma');
	}

	public function getMontantAttribute(){
		$jalon = $this->jalon;
		$projet = $this->proforma;

		return $projet->montant * $jalon->pourcentage / 100;
	}



	public function getEtatAttribute(){
		$etat=[];

		$pmts = Paiement::all()->where('facture_id',$this->id);
		$somme = 0;
		foreach($pmts as $pt){
			$somme = $somme + $pt->montant;
		}

		$montant = $this->getMontantAttribute();

		if($montant <= $somme){
			$etat['status'] = 2;
			$etat['icon'] = 'fa fa-check-circle';
			$etat['color'] = 'success';
			$etat['name'] = 'payée';
		}else {

			$etat['status'] = 1;
			$etat['icon'] = 'fa fa-stop';
			$etat['color'] = 'warning';
			$etat['name'] = 'non soldée';
		}

		return $etat;
	}




	public function getVersementAttribute(){
		$pmts = Paiement::all()->where('facture_id',$this->id);

		$somme = 0;
		foreach($pmts as $pt){
			$somme = $somme + $pt->montant;
		}

		return $somme;
	}

	/*public function getResteAttribute(){
		$vrs = $this->getVersementAttribute();
		$montant = $this->getMontantAttribute();

		return $montant - $vrs;
	}*/




}
