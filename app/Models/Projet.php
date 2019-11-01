<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    protected $guarded = [];

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

    public function ville(){
        return $this->belongsTo('App\Models\Ville');
    }

    public function teaser(){
        return $this->hasOne('App\Models\Teaser');
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
			$total = $total+$investissement->montant;
		}

		return $total;
	}

}
