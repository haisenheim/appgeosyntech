<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Produit extends Model
{
    //

	protected $table = 'articles';

	protected $guarded = [];
	public $timestamps = false;



	public function tproduit(){
		return $this->belongsTo('App\Models\Tproduit','tarticle_id');
	}

	public function fournisseur(){
		return $this->belongsTo('App\Models\Fournisseur','fournisseur_id');
	}

	public function category(){
		return $this->belongsTo('App\Models\Category','family_id');
	}





	/*public function getNameAttribute(){
		$name1 ='';
		if($this->tproduit){
			$name1 = $this->tproduit->name;
		}
		return $name1 . $this->name2;
	}*/


}
