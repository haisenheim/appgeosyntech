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

	public function commande(){
		return $this->belongsTo('App\Models\Commande', 'commande_id');
	}

	public function payeur(){

		return $this->belongsTo('App\User', 'filled_by');
	}

	public function pointages(){
		return $this->hasMany('App\Models\Pointage');
	}

	public function bulletins(){
		return $this->hasMany('App\Models\Bulletin','facture_id');
	}

	public function paiements(){
		return $this->hasMany('App\Models\Paiement');
	}

	public function getEtatAttribute(){
		$etat=[];

		if($this->filled){
			$etat['status'] = 2;
			$etat['icon'] = 'fa fa-check-circle';
			$etat['color'] = 'success';
			$etat['name'] = 'payée';
		}else {
			$etat['status'] = 1;
			$etat['icon'] = 'fa fa-stop';
			$etat['color'] = 'danger';
			$etat['name'] = 'en attente';
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


}
