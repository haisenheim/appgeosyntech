<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Infrastructure extends Model
{
    //
    protected $guarded = [];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function fincapitalsocial(){
		return $this->hasOne('App\Models\Fincapitalsocial');
	}

	public function finempobligataire(){
		return $this->hasOne('App\Models\Finempobligataire');
	}


	public function selector(){
		return $this->belongsTo('App\User','selector_id');
	}


	public function owner(){
        return $this->belongsTo('App\User','owner_id');
    }



	public function getStageAttribute(){
		$stage = "";
		$delai = 0;
		$publicated_at = $this->published_at;
		$received_at = $this->received_at;
		$consortia_selected_at = $this->consortia_selected_at;
		$first_rendered_at = $this->first_rendered_at;
		$bidders_selected_at = $this->bidders_selected_at;
		$final_rendered_at = $this->final_rendered_at;
		$concessionnaire_selected_at = $this->concessionnaire_selected_at;
		$signed_at = $this->signed_at;
		$alert = false;

		if($publicated_at){
			$pd = Carbon::parse($publicated_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$received_at){
				$stage = 'REMISE DE PREQUALIFICATION';
				$delai = $diff;
				$pd->addDays(60)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}


		}

		if($received_at){
			$pd = Carbon::parse($received_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$consortia_selected_at){
				$stage = 'Choix des consortia retenus';
				$delai = $diff;
				$pd->addDays(240)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

		if($consortia_selected_at){
			$pd = Carbon::parse($consortia_selected_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$first_rendered_at){
				$stage = 'Remise de la première offre';
				$delai = $diff;
				$pd->addDays(60)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

		if($first_rendered_at){
			$pd = Carbon::parse($first_rendered_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$bidders_selected_at){
				$stage = 'Sélection des Preffered bidders';
				$delai = $diff;
				$pd->addDays(90)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

		if($bidders_selected_at){
			$pd = Carbon::parse($bidders_selected_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$final_rendered_at){
				$stage = 'Remise de la Best And Final Offer';
				$delai = $diff;
				$pd->addDays(60)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

		if($final_rendered_at){
			$pd = Carbon::parse($final_rendered_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$concessionnaire_selected_at){
				$stage = 'Choix concessionnaire pressenti';
				$delai = $diff;
				$pd->addDays(90)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

		if($concessionnaire_selected_at){
			$pd = Carbon::parse($concessionnaire_selected_at);
			$diff = $pd->diffInDays(Carbon::now());
			if(!$signed_at){
				$stage = 'Financial Close et Signature de contrat';
				$delai = $diff;
				$pd->addDays(90)->greaterThan(Carbon::now())?$alert = true:$alert=false;
			}
		}

	}



	public  function getFtdacAttribute(){

		$projet = Infrastructure::find($this->id);
		$prvrs = $projet->prevresultats->sortBy('annee');

		$data =[];

		for($i=0;$i< count($prvrs); $i++){
			if($i==0){
				$data[$i]=$prvrs[$i]->ftda;
			}else{
				$data[$i] = $data[$i-1]+$prvrs[$i]->ftda;
			}
		}
		return $data ;
	}

	public function getVanAttribute(){

		$projet= Infrastructure::find($this->id);
		$prvs = $projet->prevresultats;

		$s=0;
		foreach($prvs as $prv){
			$s=$s+$prv->ftda;
		}
		return $s - $this->montant_investissement;
	}


	//--------------------------Calcul du taux interne de rentabilite -----------------------------------------------------------------------

	public function getTirAttribute(){
		$LOW_RATE = 0.01;
		$HIGH_RATE=1;
		$MAX_ITERATION=1000;
		$PRECISION_REQ=0.0001;



		$rate = 0.01;

		$flux = [];

		$projet = Infrastructure::find($this->id);

		$prvs = $projet->prevresultats;
		foreach($prvs as $pr){
			$flux[$pr->position] = $pr->getfluxtresodispo;
		}


		$nb= count($prvs) +1;


		$plus = 1;
		$moins = 0.01;

		// $cumul = 0.00;
		for($i=0; $i<$MAX_ITERATION; $i++)
		{

			$cumul = 0.00;
			for($j=1; $j<$nb; $j++)
			{
				$denom = pow((1 + $rate),$j);
				$cumul = $cumul + ($flux[$j] /$denom);
			}
			$cumul = $cumul - $this->montant_investissement;
			//debug($cumul); die();
			$oldvan=$cumul;
			if($cumul>0){

				$moins = $rate;
				$rate = ($plus + $moins)/2;

			}else{
				$plus = $rate;
				$rate = ($plus + $moins)/2;

			}
			if(($cumul > 0) && ($cumul < $PRECISION_REQ)){
				break;
			}


		}
		return round($rate*100 ,3) . '%';
	}


	//--------------------------Calcul du delai de recuperation des capitaux investis -------------------------------------------------------
	protected function _getPbp(){

		$flux = [];

		$projet = Infrastructure::find($this->id);

		$prvs = $projet->prevresultats;
		foreach($prvs as $pr){
			$flux[$pr->position] = $pr->getfluxtresodispo;
		}


		$nb= count($prvs) +1;

		$p=-1;
		$cumul = 0.00;
		for($i=1; $i<$nb; $i++)
		{

			$cumul = $cumul + $flux[$i];
			$p=$i;

			if($cumul >= $this->montant_investissement){

				break;
			}


		}
		return $p;
	}

	//-------------------------Calcul de l'indice de profitabilite --------------------------------------------------------------------
	protected function _getIndiceprofit(){
		return $this->montant_investissement?round($this->getVanAttribute()/$this->montant_investissement,2):0;
	}

	public function getTaux_distrib_moyenAttribute(){
		$projet = Infrastructure::find($this->id);
		$s=0;
		foreach($projet->prevresultats as $prv){
			$s = $s+$prv->tauxdistrib;
		}
		return $s / count($projet->prevresultats);
	}

	public function getVariationsAttribute(){


		$prevrls = Prevresultat::all()->where('infrastructure_id',$this->id)->sortBy('annee');
		$prevbils = Prevbilan::all()->where('infrastructure_id',$this->id)->sortBy('annee');
		$prevbls = [];
		$prevrs=[];
		$i=0;
		foreach($prevbils as $pb){
			$prevbls[$i++] = $pb;
		}

		$i=0;
		foreach($prevrls as $pb){
			$prevrs[$i++] = $pb;
		}

		//debug($prevrs);
		//dd($pbilans);
		$bc = count($prevbls);
		$nb = count($prevrs);
		$data=[];
		for($i=0;$i<$nb-1;$i++){
			$data['ca'][$i]=$prevrs[$i]->ca?round((($prevrs[$i+1]->ca-$prevrs[$i]->ca)/$prevrs[$i]->ca)*100,2):0;
			$data['mb'][$i]=$prevrs[$i]->mb?round((($prevrs[$i+1]->mb-$prevrs[$i]->mb)/$prevrs[$i]->mb)*100,2):0;
			$data['va'][$i]=$prevrs[$i]->va?round((($prevrs[$i+1]->va - $prevrs[$i]->va)/$prevrs[$i]->va)*100,2):0;
			$data['ebe'][$i]=$prevrs[$i]->ebe?round((($prevrs[$i+1]->ebe - $prevrs[$i]->ebe)/$prevrs[$i]->ebe)*100,2):0;
			$data['re'][$i]=$prevrs[$i]->re?round((($prevrs[$i+1]->re - $prevrs[$i]->re)/$prevrs[$i]->re)*100,2):0;
			$data['rf'][$i]=$prevrs[$i]->rf?round((($prevrs[$i+1]->rf - $prevrs[$i]->rf)/$prevrs[$i]->rf)*100,2):0;
			$data['rex'][$i]=$prevrs[$i]->rex?round((($prevrs[$i+1]->rex -$prevrs[$i]->rex)/$prevrs[$i]->rex)*100,2):0;
			$data['rcai'][$i]=$prevrs[$i]->rcai?round((($prevrs[$i+1]->rcai -$prevrs[$i]->rcai)/$prevrs[$i]->rcai)*100,2):0;
			$data['rn'][$i]=$prevrs[$i]->rn?round((($prevrs[$i+1]->rn -$prevrs[$i]->rn)/$prevrs[$i]->rn)*100,2):0;
		}
		for($i=0;$i<$bc-1;$i++){
			$data['fr'][$i]=$prevbls[$i]->fr?round((($prevbls[$i+1]->fr-$prevbls[$i]->fr)/$prevbls[$i]->fr)*100,2):0;
			$data['bfr'][$i]=$prevbls[$i]->bfr?round((($prevbls[$i+1]->bfr-$prevbls[$i]->bfr)/$prevbls[$i]->bfr)*100,2):0;
			$data['tn'][$i]=$prevbls[$i]->tn?round((($prevbls[$i+1]->tn-$prevbls[$i]->tn)/$prevbls[$i]->tn)*100,2):0;

		}
		//dd($data);
		return $data;
	}
    public function ville(){
        return $this->belongsTo('App\Models\Ville');
    }

    public function teaser(){
        return $this->hasOne('App\Models\Teaser');
    }

	public function devise(){
		return $this->belongsTo('App\Models\Devise');
	}
    public function secteur(){
        return $this->belongsTo('App\Models\Secteur');
    }

	public function concessions(){
		return $this->hasMany('App\Models\Concession');
	}

    public function consultant(){
        return $this->belongsTo('App\User','expert_id');
    }


    public function bilans(){
        return $this->hasMany('App\Models\Bilan');
    }

	public function reportbilans(){
		return $this->hasMany('App\Models\Reportbilan');
	}

	public function reportresultats(){
		return $this->hasMany('App\Models\Reportresultat');
	}

    public function resultats(){
        return $this->hasMany('App\Models\Resultat');
    }

    public function prevbilans(){
        return $this->hasMany('App\Models\Prevbilan');
    }

    public function prevresultats(){
        return $this->hasMany('App\Models\Prevresultat');
    }

    public function concurrents(){
        return $this->hasMany('App\Models\Concurrent');
    }

    public function segments(){
        return $this->hasMany('App\Models\Segment');
    }

	public function environnement(){
		return $this->hasOne('App\Models\Environnement');
	}

    public function swot(){
        return $this->hasOne('App\Models\Swot');
    }

	public function modele(){
		return $this->hasOne('App\Models\Modele');
	}

	public function choices(){
		return $this->hasMany('App\Models\ChoicesInfrastructure');
	}

	public function tags(){
		return $this->belongsToMany('App\Models\Tags','tags_projets','infrastructure_id','tag_id');
	}

	public function produits(){
		return $this->hasMany('App\Models\InfrastructuresProduit');
	}


	public function ressources(){
		return $this->hasMany('App\Models\Ressource');
	}

	public function etapes(){
		return $this->hasMany('App\Models\Etape');
	}

	public function modepaiement(){
		return $this->belongsTo('App\Models\Modepaiement');
	}



	public function moyens(){
		return $this->belongsToMany('App\Models\Moyen','infrastructures_moyens');
	}
	public function financements(){
		return $this->hasMany('App\Models\InfrastructuresMoyen');
	}

	public function prevtresoreries(){
		return $this->hasMany('App\Models\Prevtresorerie');
	}

	public function getProgressAttribute(){
		//$progress= 0;
		return ($this->attributes['validated_step']/4) * 100;
	}

	protected function getProgresscolorAttribute(){
		$colors = ['red','yellow','blue','cyan','green'];
		return $colors[$this->attributes['validated_step']];
	}

	protected function getTypecolorAttribute(){
		$colors = ['default','primary','info','success'];
		return $colors[$this->attributes['active']];
	}

	protected function getTotalAttribute(){
		$investissements = Concession::all()->where('infractructure_id',$this->id);
		$total = 0;
		foreach($investissements as $investissement){
			$letter = $investissement->lettre;
			if($letter){
				$total = $total+$letter->montant;
			}
		}
		return $total;
	}

	protected function getPourcentageAttribute(){
		$total = $this->getTotalAttribute();
		$d = $this->montant? round(($total/$this->montant)*100,2):0;
		return $d;
	}

	protected function getInvestcolorAttribute(){
		$colors = ['danger','warning','primary','success'];
		$total = $this->getTotalAttribute();
		$tr=0;
		if($total <= 25){
			$tr =0;
		}
		if($total > 25 && $total<=50){
			$tr =1;
		}
		if($total > 50 && $total <=75){
			$tr =2;
		}
		if($total > 75){
			$tr =0;
		}

		return $colors[$tr];
	}

	protected function getAuthorizedAttribute(){
		if(Auth::user()->role_id==4){
			if(Auth::user()->organisme_id){
				$investissement = Concession::all()->where('infrastructure_id',$this->id)->where('organisme_id',Auth::user()->organisme_id)->first();
				if($investissement){
					//debug($investissement);
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}

			if(Auth::user()->entreprise_id){
				$investissement = Concession::all()->where('infrastructure_id',$this->id)->where('entreprise_id',Auth::user()->entreprise_id)->first();
				if($investissement){
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}
		}
		return true;
	}
}
