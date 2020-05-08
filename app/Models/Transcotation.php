<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transcotation extends Model
{
    //
    protected $guarded = [];
	//protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function transitaire(){
		return $this->belongsTo('App\Models\Fournisseur', 'transitaire_id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

	public function origine(){
		return $this->belongsTo('App\Models\Ville', 'origine_id');
	}

	public function destination(){
		return $this->belongsTo('App\Model\Ville', 'destination_id');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Lcotation','transcotation_id');
	}

	public function ioption(){
		return $this->belongsTo('App\Models\ImportOption','import_option_id');
	}

	public function toption(){
		return $this->belongsTo('App\Models\TransportOption','transport_option_id');
	}

	public function getGrossVolumeAttribute(){
		$lignes = $this->lignes;
		$s=0;
		if($lignes){
			foreach($lignes as $ligne){
				$s= $s + $ligne->gross_volume;
			}
		}

		return $s;
	}

	public function getGrossWeigthAttribute(){
		$lignes = $this->lignes;
		$s=0;
		if($lignes){
			foreach($lignes as $ligne){
				$s= $s + $ligne->gross_weigth;
			}
		}

		return $s;
	}

}
