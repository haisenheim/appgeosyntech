<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Actif extends Model
{
    //

	protected $guarded = [];

	public function tactif(){
		return $this->belongsTo('App\Models\Tactif','tactif_id');
	}

	public function ville(){
		return $this->belongsTo('App\Models\Ville');
	}

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}
	public function consultant(){
		return $this->belongsTo('App\User','expert_id');
	}

	public function cessions(){
		return $this->hasMany('App\Models\Cession');
	}

	protected function getSubscribedAttribute(){
		$cessions = $this->cessions();
		$exist = false;
		$id = Auth::user()->id;
		foreach($cessions as $cession){
			dd($cession);
			if($cession->angel_id==$id){
				$exist=true;
			}
		}

		return $exist;
	}
}
