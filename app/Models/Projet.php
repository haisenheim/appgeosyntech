<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Projet extends Model
{
    //
    protected $guarded = [];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

    public function type(){
        return $this->belongsTo('App\Models\Tprojet', 'type_id');
    }

    public function variante(){
        return $this->belongsTo('App\Models\Variante');
    }

	public function auteur(){
		return $this->belongsTo('App\User','author_id');
	}


	public function owner(){
        return $this->belongsTo('App\User','owner_id');
    }

	public function getTraiteAttribute(){
		$s=0;
		$projet = Projet::find($this->id);
		if($projet->modepaiement_id==1){
			$s= 129500;
			if($projet->owner){
				if($projet->owner->apporteur_id){
					$s=143000;
				}
			}
		}

		if($projet->modepaiement_id==2){
			$s= 880000;

			if($projet->owner){
				if($projet->owner->creator){
					if($projet->owner->creator->role_id==7){
						$s=967200;
					}
				}
			}
		}

		return $s;
	}

	public function getCommissionAttribute(){
		$s=0;
		$projet = Projet::find($this->id);
		if($projet->modepaiement_id==1){

			if($projet->owner){
				if($projet->owner->creator){
					if($projet->owner->creator->role_id==7){
						$s=10875;
					}
				}
			}
		}

		if($projet->modepaiement_id==2){

			if($projet->owner){
				if($projet->owner->creator){
					if($projet->owner->creator->role_id==7){
						$s=73950;
					}
				}
			}


		}

		return $s;
	}

	public function getComexpertAttribute(){
		$s=0;
		$projet = Projet::find($this->id);
		if($projet->modepaiement_id==1){
			$s=10000;
			if($projet->consultant){
				if($projet->consultant->confirmed){
					$s=12500;
				}

				if($projet->consultant->senior){
					$s=15000;
				}
			}
		}

		if($projet->modepaiement_id==2){

			$s=75000;
			if($projet->consultant){
				if($projet->consultant->confirmed){
					$s=93750;
				}

				if($projet->consultant->senior){
					$s=112500;
				}
			}
		}

		return $s;
	}

	public function getComalliagesAttribute(){
		$s=0;
		$projet = Projet::find($this->id);
		if($projet->modepaiement_id==1){
			$s = 33750;
		}

		if($projet->modepaiement_id==2){
			$s = 229500;
		}

		return $s;
	}



	public  function getFtdacAttribute(){

		$projet = Projet::find($this->id);
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

		$projet= Projet::find($this->id);
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

		$projet = Projet::find($this->id);

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

		$projet = Projet::find($this->id);

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
		$projet = Projet::find($this->id);

		$s=0;
		foreach($projet->prevresultats as $prv){
			$s = $s+$prv->tauxdistrib;
		}
		return $s / count($projet->prevresultats);
	}

	public function getVariationsAttribute(){
		$prevrls = Prevresultat::all()->where('projet_id',$this->id)->sortBy('annee');
		$prevbils = Prevbilan::all()->where('projet_id',$this->id)->sortBy('annee');
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

    public function tinvestissements(){
        return $this->belongsToMany('App\Models\Tinvestissement','projets_tinvestissements');
    }


	public function investissements(){
		return $this->hasMany('App\Models\Investissement');
	}

	public function fincapitalsocial(){
		return $this->hasOne('App\Models\Fincapitalsocial');
	}


    public function consultant(){
        return $this->belongsTo('App\User','expert_id');
    }

    public function typecontrat(){
        return $this->belongsToMany('App\Models\Tcontrat','projets_tcontrats');
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
		return $this->hasMany('App\Models\ChoicesProjet');
	}

	public function tags(){
		return $this->belongsToMany('App\Models\Tags','tags_projets','projet_id','tag_id');
	}

	public function produits(){
		return $this->hasMany('App\Models\ProduitsProjet');
	}

	public function etapes(){
		return $this->hasMany('App\Models\Etape');
	}

	public function ressources(){
		return $this->hasMany('App\Models\Ressource');
	}

	public function modepaiement(){
		return $this->belongsTo('App\Models\Modepaiement');
	}



	public function moyens(){
		return $this->belongsToMany('App\Models\Moyen','moyens_projets');
	}
	public function financements(){
		return $this->hasMany('App\Models\Moyens_projet');
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
		$investissements = Investissement::all()->where('projet_id',$this->id);
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
				$investissement = Investissement::all()->where('projet_id',$this->id)->where('organisme_id',Auth::user()->organisme_id)->first();
				if($investissement){
					//debug($investissement);
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}

			if(Auth::user()->entreprise_id){
				$investissement = Investissement::all()->where('projet_id',$this->id)->where('entreprise_id',Auth::user()->entreprise_id)->first();
				if($investissement){
					if($investissement->angel_id!=Auth::user()->id){
						return false;
					}
				}
			}
		}
		return true;
	}

	protected function getCoutglobalAttribute(){
		return ($this->bfr + $this->montant_investissement);
	}

	public function getAlreadyAttribute(){
		if(Auth::user()->role_id==4){
			$investissement = Investissement::where('projet_id',$this->id)->where('angel_id',Auth::user()->id)->first();
			if($investissement){
				return true;
			}
			return false;
		}
		return false;
	}
}
