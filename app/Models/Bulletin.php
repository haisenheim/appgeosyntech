<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bulletin extends Model
{
    //

	protected $guarded = [];

	public function owner(){
		return $this->belongsTo('App\User');
	}

	public function livraison(){
		return $this->belongsToMany('App\Models\Livraison');
	}

	public function facture(){
		return $this->belongsToMany('App\Models\Facture');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function pointages(){
		return $this->hasMany('App\Models\Pointage');
	}


	public function getMontantAttribute(){
		$bulletin = Bulletin::find($this->id);
		$sm = $bulletin->minimum;

		$primes = Prime::all()->where('livraison_id',$bulletin->livraison_id);
		$s =0;
		foreach($primes as $prime){
			$s = $s + $prime->montant;
		}

		return $sm + $s;
	}

}
