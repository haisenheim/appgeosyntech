<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investissement extends Model
{

    //

	protected $dates = ['rencontre'];

	protected $guarded = [];

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function angel(){
		return $this->belongsTo('App\User','angel_id');
	}

	public function comments(){
		return $this->hasMany('App\Models\Comment','investissement_id');
	}

	public function lettre(){
		return $this->hasOne('App\Models\Lettre','investissement_id');
	}

	public function getDossierAttribute(){
		if($this->earlie_id){
			return Earlie::find($this->earlie_id);
		}

		if($this->projet_id){
			return Projet::find($this->projet_id);
		}

		return null;

	}
}
