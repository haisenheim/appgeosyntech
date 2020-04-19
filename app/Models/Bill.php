<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bill extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function partenaire(){
		return $this->belongsTo('App\Models\Client', 'client_id');
	}



	public function payeur(){

		return $this->belongsTo('App\User', 'filled_by');
	}



	public function certificats(){
		return $this->hasMany('App\Models\Certificat','bill_id');
	}

	public function depenses(){
		return $this->hasMany('App\Models\Depense','bill_id');
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



	public function getMontantAttribute(){
		$bulletins = Bulletin::all()->where('facture_id',$this->id);
		$m = 0;
		foreach($bulletins as $bulletin){
			$m = $bulletin->montant + $m;
		}

		$m = $m*(1 + $this->pourcentage/100);

		return $m;
	}

	public function getVersementAttribute(){
		$pmts = Paiement::all()->where('facture_id',$this->id);

		$somme = 0;
		foreach($pmts as $pt){
			$somme = $somme + $pt->montant;
		}

		return $somme;
	}

	public function getResteAttribute(){
		$vrs = $this->getVersementAttribute();
		$montant = $this->getMontantAttribute();

		return $montant - $vrs;
	}




}
