<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Approvisionnement extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;


	public function lignes(){
		return $this->hasMany('App\Models\Lappro');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function getNombreAttribute(){

		$lignes = Lappro::all()->where('approvisionnement_id',$this->id);
		$s=0;
		foreach($lignes as $ligne){
			$s = $s+$ligne->quantity;
		}
		return $s;
	}

}
