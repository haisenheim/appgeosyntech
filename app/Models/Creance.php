<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Creance extends Model
{
    //

	protected $guarded = [];



	public function devise(){
		return $this->belongsTo('App\Models\Devise');
	}

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}
	public function consultant(){
		return $this->belongsTo('App\User','expert_id');
	}

	public function pays(){
		return $this->belongsTo('App\Pay');
	}

	public function cessions(){
		return $this->hasMany('App\Models\Cession');
	}

	protected function getSubscribedAttribute(){
		$cessions = Cession::all()->where('actif_id',$this->id);
		//$cessions = $this->cessions();
		//dd($cessions);
		$exist = false;
		$id = Auth::user()->id;
		foreach($cessions as $cession){
			//dd($cession);
			if($cession->angel_id==$id){
				$exist=true;
			}
		}

		return $exist;
	}
}
