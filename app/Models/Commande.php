<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Commande extends Model
{
    //

	protected $guarded = [];

	protected $dates = ['debut','fin'];


	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Cligne');
	}

	public function livraisons(){
		return $this->hasMany('App\Models\Livraison');
	}

	public function factures(){
		return $this->hasMany('App\Models\Facture');
	}

	public function getEtatAttribute(){
		$etat=[];

		$livraisons = Livraison::all()->where('commande_id',$this->id);

		if($livraisons->count()){
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






}
