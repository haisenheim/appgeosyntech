<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Lcotation extends Model
{
    //

	protected $guarded = [];
	//protected $dates = ['debut','fin'];
	public $timestamps = false;


	public function transcotation(){
		return $this->belongsTo('App\Models\Transcotation','trancotation_id');
	}

	public function frncotation(){
		return $this->belongsTo('App\Models\Frncotation','frncotation_id');
	}

	public function produit(){
		return $this->belongsTo('App\Models\Produit');
	}

	public function getAreaAttribute(){
		$p = $this->produit;
		return $p->longueur * $p->largeur;
	}

	public function getGrossVolumeAttribute(){
		$p= $this->produit;
		$v = $p->volume;
		return $v * $this->quantity;
	}



	public function getGrossWeigthAttribute(){
		$pd = $this->produit->poids;
		return $pd * $this->quantity;
	}



	public function getPriceFcfaAttribute(){
		return $this->price * 656;
	}

	public function getTotalAttribute(){
		return $this->price * $this->quantity;
	}

	public function getTotalFcfaAttribute(){
		return $this->price * $this->quantity * 656;
	}

	public function getMontantAttribute(){
		return $this->pu * $this->quantity;
	}




}
