<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProduitProjet extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	public $table ='produits_projets';
	//protected $dates = ['debut','fin'];


	public function produit(){
		return $this->belongsTo('App\Models\Produit','produit_id');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet','projet_id');
	}

	public function unit(){
		return $this->belongsTo('App\Models\Unit','unit_id');
	}


}
