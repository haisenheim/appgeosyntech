<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Lproforma extends Model
{
    //

	protected $guarded = [];
	//protected $dates = ['debut','fin'];
	public $timestamps = false;


	public function proforma(){
		return $this->belongsTo('App\Models\Proforma','proforma_id');
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

	public function getMontantAttribute(){
		return $this->quantity * $this->price;
	}






}
