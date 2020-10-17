<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Proforma extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['debut','fin'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function client(){
		return $this->belongsTo('App\Models\Client', 'client_id');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet', 'projet_id');
	}

	public function factures(){
		return $this->hasMany('App\Models\Facture');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}



	public function lignes(){
		return $this->hasMany('App\Models\Lproforma','proforma_id');
	}

	public function jalons(){
		return $this->hasMany('App\Models\Jalon','proforma_id');
	}

	public function frncotation(){
		return $this->belongsTo('App\Models\Frncotation');
	}


	public function getMontantAttribute(){
		$frn = $this->frncotation;
		$lignes = $frn->lignes;
		$som =0;
		foreach($lignes as $ligne){
			$som = $som + $ligne->montant;
		}

		return $som;
	}



	public function getGrossVolumeAttribute(){
		$lignes = $this->lignes;
		$s=0;
		if($lignes){
			foreach($lignes as $ligne){
				$s= $s + $ligne->gross_volume;
			}
		}

		return $s;
	}

	public function getGrossWeigthAttribute(){
		$lignes = $this->lignes;
		$s=0;
		if($lignes){
			foreach($lignes as $ligne){
				$s= $s + $ligne->gross_weigth;
			}
		}

		return $s;
	}



	public function getVtvaAttribute(){
		return $this->getMontantAttribute() * 19.25/100;
	}

	public function getVairAttribute(){
		return $this->getMontantAttribute() * 2.2/100;
	}

	public function getTotalAttribute(){
		return $this->getMontantAttribute() + $this->getVairAttribute() + $this->getVtvaAttribute();
	}



}
