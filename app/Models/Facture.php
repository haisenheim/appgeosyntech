<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Facture extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function client(){
		return $this->belongsTo('App\Models\Client', 'client_id');
	}




	public function paiements(){
		return $this->hasMany('App\Models\Paiement');
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
