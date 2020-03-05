<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    //

	protected $guarded = ['id'];

	public function modules(){
		return $this->hasMany('App\Models\Module');
	}

	public function contributeur(){
		return $this->belongsTo('App\User','owner_id');
	}

	public function pays(){
		return $this->belongsToMany('App\Models\Pay','formations_pays');
	}

	public function consultants(){
		return $this->belongsToMany('App\User','consultants_formations');
	}

	public function getPrixLigneAttribute(){
		$modules = Module::all()->where('formation_id',$this->id);
		$s = 0;
		foreach($modules as $module){
			$s += $module->prix_ligne;
		}

		return $s;
	}

	public function getGratuiteAttribute(){
		$modules = Module::all()->where('formation_id',$this->id);
		$free = true;
		foreach($modules as $module){
			if($module->prix_ligne==0 || $module->free){
				$free = false;
				break;
			} ;
		}

		return $free;
	}

	public function getPrixPresentielAttribute(){
		$modules = Module::all()->where('formation_id',$this->id);
		$s = 0;
		foreach($modules as $module){
			$s += $module->prix_presentiel;
		}

		return $s;
	}
}
