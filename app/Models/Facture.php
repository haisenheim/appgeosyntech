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

	public function client(){
		return $this->belongsTo('App\Models\Client', 'client_id');
	}

	public function commande(){
		return $this->belongsTo('App\Models\Commande', 'commande_id');
	}

	public function payeur(){

		return $this->belongsTo('App\User', 'filled_by');
	}

	public function


}
