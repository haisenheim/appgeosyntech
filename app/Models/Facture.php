<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Facture extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function owner(){
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function payeur(){
		return $this->belongsTo('App\User', 'filled_by');
	}

	public function lignes(){
		if($this->contibuteur){
			return $this->hasMany('App\Models\Paiement','facture_contributeur_id');
		}
		if($this->consultant){
			return $this->hasMany('App\Models\Paiement','facture_consultant_id');
		}else{

			return $this->hasMany('App\Models\Paiement','facture_alliages_id');
		}

	}

	public function getMontantAttribute(){
		$facture = Facture::find($this->id);
		$lignes = $facture->lignes;
		$s=0;
		if($lignes){
			if($this->apporteur){
				foreach($lignes as $ligne){
					$s = $s+$ligne->montant_apporteur;
				}
			}

			if($this->consultant){
				foreach($lignes as $ligne){
					$s = $s+$ligne->montant_consultant;
				}
			}

			if($this->alliages){
				foreach($lignes as $ligne){
					$s = $s+$ligne->montant_alliages;
				}
			}

		}

		return $s;
	}

}
