<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tproduit extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $table = 'tarticles';


	public function produits(){
		return $this->hasMany('App\Models\Produit');
	}

}
