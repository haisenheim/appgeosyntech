<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportresultat extends Model
{
    //
	protected $guarded =[];
	//public $timestamps = false;
	//protected $table = 'testresultats';
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi');
	}

	protected function getNameAttribute(){
		return $this->moi_id . "/" . $this->annee;
	}
}
