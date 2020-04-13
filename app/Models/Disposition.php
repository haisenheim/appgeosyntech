<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Disposition extends Model
{
    //

	protected $guarded = [];

	//protected $dates = ['debut','fin'];


	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function commande(){
		return $this->belongsTo('App\Models\Commande');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Ldispo');
	}

	public function getNombreAttribute(){

		$lignes = Ldispo::all()->where('disposition_id',$this->id);
		$s=0;
		foreach($lignes as $ligne){
			$s = $s+$ligne->quantity;
		}
		return $s;
	}




}
