<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Projet extends Model
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

	public function maitre(){
		return $this->belongsTo('App\Models\Client', 'maitreouvrage_id');
	}

	public function cs(){
		return $this->belongsTo('App\Models\Client', 'cs_id');
	}

	public function ing(){
		return $this->belongsTo('App\Models\Client', 'ing_id');
	}

	public function contractant(){
		return $this->belongsTo('App\Models\Client', 'contractant_id');
	}

	public function pays(){
		return $this->belongsTo('App\Models\Pay', 'pay_id');
	}

	public function region(){
		return $this->belongsTo('App\Models\Region', 'region_id');
	}

	public function paiements(){
		return $this->hasMany('App\Models\Paiement');
	}

	public function etapes(){
		return $this->belongsToMany('App\Models\Etape','projets_etapes')->withPivot(['debut','fin']);
	}

	public function steps(){
		return $this->hasMany('App\Models\EtapeProjet','projet_id');
	}

	public function domaines(){
		return $this->belongsToMany('App\Models\Domaine','domaines_projets');
	}

	public function elements(){
		return $this->hasMany('App\Models\ProduitProjet','projet_id');
	}


	public function getSiteAttribute(){
		$p = '';
		if($this->pays){
			$p= $this->pays->name;
		}
		$r = '';
		if($this->region){
			$r= $this->region->name;
		}

		return $this->lieu .' / '.$r.' / '.$p;
	}

	/*public function getResteAttribute(){
		$vrs = $this->getVersementAttribute();
		$montant = $this->getMontantAttribute();

		return $montant - $vrs;
	}*/




}
