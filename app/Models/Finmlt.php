<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finmlt extends Model
{
    //
	protected $guarded = [];
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}

	public function dossier(){

		if($this->projet_id){
			return Projet::find($this->projet_id);
		}
		if($this->earlie_id){
			return Earlie::find($this->earlie_id);
		}
		if($this->infrastructure_id){
			return Infrastructure::find($this->infrastructure_id);
		}
		return null;
	}

	//----------------------------------------------------------------------------------------------------------------//
	//                 Remboursement in fine                                                                          //
	//----------------------------------------------------------------------------------------------------------------//

	//----------------- Calcul du capital de debut de periode ----------------------------------------------------------


	public function getArrayCapitalRifAttribute(){
		$tab = [];
		$n= $this->rif_de;

		$som=0;
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $this->rif_se;
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}


	//---------------- Calcul des interets ----------------------------------------------------------------------------

	public function getArrayInteretRifAttribute(){
		$tab = [];
		$n= $this->rif_de;

		$som=0;
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $this->rif_se * $this->rif_ti/100;
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}



	//--------------- Calcul des amortissements ------------------------------------------------------------------------

	public function getArrayAmortissementRifAttribute(){
		$tab = [];
		$n= $this->rif_de;

		$som=0;
		for($i = 1; $i<$n; $i++){
			$tab[$i] = 0;
			$som = $som + $tab[$i];
		}
		$tab[$n] = $this->rif_se;
		$som = $som + $tab[$n];

		$tab[0]=$som;
		return $tab;
	}



	//----------------------- Calcul des annuites ou mensualites -------------------------------------------------------

	public function getArrayAnnuiteRifAttribute(){
		$tab = [];
		$n= $this->rif_de;
		$tab1 = $this->getArrayInteretRifAttribute();
		$tab2 = $this->getArrayAmortissementRifAttribute();
		$som=0;
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $tab1[$i] + $tab2[$i];
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}

	//----------------------------------------------------------------------------------------------------------------//
	//                 Remboursement par annuités constantes*                                                         //
	//----------------------------------------------------------------------------------------------------------------//

	//---------------------- Calcul du taux fictif --------------------------------------------------------------------
	public  function getTfRasAttribute(){
		return $this->ras_ti?round((1- pow((1+ $this->ras_ti/100),-$this->ras_de)) / $this->ras_ti/100,2):0;
	}

	//---------------------- Calcul de l'annuite constante --------------------------------------------------------------------
	public  function getAnnuiteConstRasAttribute(){
		return $this->getTfRasAttribute()? round($this->ras_se/$this->getTfRasAttribute(),2) :0;
	}

	// Tableau des flux de tresorerie

	public function getTabAttribute(){
		$tab = [];
		$am=[]; // les amortissements
		$in =  []; // Les interets
		$an = []; //les annuites
		$cap = []; //Capital

		$cap[1]= $this->ras_se;
		$in[1] = $cap[1] * $this->ras_ti/100;
		$an[1] = $this->getTfRasAttribute()?$this->ras_se/$this->getTfRasAttribute():0;
		$am[1] = $an[1] - $in[1];

		$in[0] = $cap[1] * $this->ras_ti/100;
		$an[0] = $this->getTfRasAttribute()?$this->ras_se/$this->getTfRasAttribute():0;
		$am[0] = $an[1] - $in[1];
		for($i=2;$i<=$this->ras_de;$i++){
			$j=$i-1;
			$cap[$i]= $cap[$j]-$am[$j];


			$in[$i] = $cap[$i] * $this->ras_ti/100;
			$in[0] = $in[0] + $in[$i];

			$an[$i] = $this->getTfRasAttribute()?$this->ras_se/$this->getTfRasAttribute():0;
			$an[0] = $an[0] + $an[$i];

			$am[$i] = $an[$i] - $in[$i];
			$am[0] = $am[0] + $am[$i];
		}

		$tab['capital']=$cap;
		$tab['interets']=$in;
		$tab['amortissement']=$am;
		$tab['annuite'] = $an;

		return $tab;
	}


	//----------------------------------------------------------------------------------------------------------------//
	//                 Remboursement par annuités constantes*                                                         //
	//----------------------------------------------------------------------------------------------------------------//

	//---------------------- Calcul du taux fictif --------------------------------------------------------------------
	public  function getTfRaccAttribute(){
		return $this->racc_ti?round((1- pow((1+ $this->ras_ti/100),-$this->racc_de)) / $this->racc_ti/100,2):0;
	}

	//---------------------- Calcul de l'annuite constante --------------------------------------------------------------------
	public  function getAnnuiteConstRaccAttribute(){
		return $this->getTfRasAttribute()? round($this->racc_se/$this->getTfRasAttribute(),2) :0;
	}

	// Tableau des flux de tresorerie

	public function getTab2Attribute(){
		$tab = [];
		$am=[]; // les amortissements
		$in =  []; // Les interets
		$an = []; //les annuites
		$cap = []; //Capital

		$cap[1]= $this->racc_se;
		$in[1] = $cap[1] * $this->racc_ti/100;
		$am[1] = $this->racc_de?$this->racc_se/$this->racc_de:0;
		$an[1] = $in[1] + $am[1];

		$in[0] = $cap[1] * $this->racc_ti/100;
		$am[0] = $this->racc_de?$this->racc_se/$this->racc_de:0;
		$an[0] = $in[1] + $am[1];

		for($i=2;$i<=$this->racc_de;$i++){
			$j=$i-1;
			$cap[$i]= $cap[$j]-$am[$j];

			$in[$i] = $cap[$i] * $this->racc_ti/100;
			$in[0] = $in[0] + $in[$i];

			$am[$i] = $this->racc_de?$this->racc_se/$this->racc_de:0;
			$am[0] = $am[0] + $am[$i];

			$an[$i] = $in[$i] + $am[$i];
			$an[0] = $an[0] + $an[$i];


		}

		$tab['capital']=$cap;
		$tab['interets']=$in;
		$tab['amortissement']=$am;
		$tab['annuite'] = $an;

		return $tab;
	}

}
