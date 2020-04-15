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

	public function client(){
		return $this->belongsTo('App\Models\Client','client_id');
	}

	public function user(){
		return $this->belongsTo('App\User','user_id');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi','moi_id');
	}


}
