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

	public function getVariationsAttribute(){
		$prevrs = Prevresultat::all()->where('projet_id',$this->id)->sortBy('annee');
		$prevbls = Prevbilan::all()->where('projet_id',$this->id)->sortBy('annee');
		$pbilans = [];
		$i=0;
		foreach($prevbls as $pb){
			$pbilans[$i++] = $pb;
		}
		//debug($prevrs);
		dd($pbilans);
		$bc = $prevbls->count();
		$nb = $prevrs->count();
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
		dd($data);
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
}
