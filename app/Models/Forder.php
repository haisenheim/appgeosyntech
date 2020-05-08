<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Forder extends Model
{
    //

	protected $guarded = [];

	protected $dates = ['jour'];


	public function fournisseur(){
		return $this->belongsTo('App\Models\Fournisseur');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Lforder');
	}




	public function getStepAttribute(){

		$step=[];

		if($this->active){
			if($this->validated){
				if($this->ordered){
					$step['level'] =3;
					$step['color'] = 'success';
					$step['name'] = 'commandée';

				}else{
					$step['level'] =2;
					$step['color'] = 'primary';
					$step['name'] = 'non commandée';
				}
			}else{
				$step['level'] = 1;
				$step['color'] = 'warning';
				$step['name'] = 'brouillon';
			}
		}else{
			$step['level'] = 0;
			$step['color'] = 'danger';
			$step['name'] = 'annulée';
		}

		return $step;
	}

	public function getNombreAttribute(){

		$lignes = $this->lignes;
		$s=0;
		foreach($lignes as $ligne){
			$s = $s+$ligne->quantity;
		}

		return $s;
	}

	public function getMontantAttribute(){
		$lignes = $this->lignes;
		$som =0;
		foreach($lignes as $ligne){
			$som = $som + $ligne->montant;
		}

		return $som;
	}
}
