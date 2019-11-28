<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Creance extends Model
{
    //

	protected $guarded = [];
	protected $dates = [
		'dt_paiement'
	];



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

	protected function getAuthorizedAttribute(){
		if(Auth::user()->role_id==4){
			if(Auth::user()->organisme_id){
				$investissement = Cession::all()->where('creance_id',$this->id)->where('organisme_id',Auth::user()->organisme_id)->first();
				if($investissement){
					//debug($investissement);
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}

			if(Auth::user()->entreprise_id){
				$investissement = Cession::all()->where('creance_id',$this->id)->where('entreprise_id',Auth::user()->entreprise_id)->first();
				if($investissement){
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}
		}
		return true;
	}

	public function getAlreadyAttribute(){
		if(Auth::user()->role_id==4){
			$investissement = Cession::where('creance_id',$this->id)->where('angel_id',Auth::user()->id)->first();
			if($investissement){
				return true;
			}
			return false;
		}
		return false;
	}
}
