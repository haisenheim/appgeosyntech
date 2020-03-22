<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
	protected $guarded = [];
	public function facture(){
		return $this->belongsTo('App\Models\Facture','facture_id');
	}


	public function moi(){
		return $this->belongsTo('App\Models\Moi');
	}


}
