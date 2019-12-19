<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fincredbail extends Model
{
    //
	protected  $guarded = [];
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
	//                Remboursement par amortissement constant                                                        //
	//----------------------------------------------------------------------------------------------------------------//



	//------------------------- Calcul des amortissements -------------------------------------------------------------
	public function getAmortissement1RacAttribute(){
		return $this->rac_de?round($this->rac_se / $this->rac_de,3):0;
	}
	public function getAmortissement2RacAttribute(){
		return $this->rac_de?round($this->rac_se / $this->rac_de,3):0;
	}
	public function getAmortissement3RacAttribute(){
		return $this->rac_de?round($this->rac_se / $this->rac_de,3):0;
	}
	public function getAmortissementnRacAttribute(){
		return $this->rac_de?round($this->rac_se / $this->rac_de,3):0;
	}

	public function getAmortissementtRacAttribute(){
		return $this->getAmortissementnRacAttribute() + $this->getAmortissement3RacAttribute() + $this->getAmortissement2RacAttribute() + $this->getAmortissement1RacAttribute();
	}

	//--------------------- Calcul du capital du en debut de periode ---------------------------------------------------
	public function getCapital1RacAttribute(){
		return $this->rac_se;
	}

	public function getCapital2RacAttribute(){
		return $this->getCapital1RacAttribute() - $this->getAmortissement1RacAttribute();
	}

	public function getCapital3RacAttribute(){
		return $this->getCapital2RacAttribute() - $this->getAmortissement2RacAttribute();
	}

	public function getCapitalnRacAttribute(){
		return round($this->getAmortissementnRacAttribute()/(1+$this->rac_ti),2);
	}

	//--------------------- Calcul de l'interet ------------------------------------------------------------------------
	public function getInteret1RacAttribute(){
		return round($this->getCapital1RacAttribute() * $this->rac_ti,2);
	}

	public function getInteret2RacAttribute(){
		return round($this->getCapital2RacAttribute() * $this->rac_ti,2);
	}
	public function getInteret3RacAttribute(){
		return round($this->getCapital3RacAttribute() * $this->rac_ti,2);
	}

	public function getInteretnRacAttribute(){
		return round($this->getCapitalnRacAttribute() * $this->rac_ti,2);
	}

	public function getInterettRacAttribute(){
		return $this->getInteret1RacAttribute() + $this->getInteret2RacAttribute() + $this->getInteret3RacAttribute() + $this->getInteretnRacAttribute();
	}
	//----------------------------------- Calcul de l'assurance --------------------------------------------------------
	public function getAssurance1RacAttribute(){
		return $this->rac_mt_ass;
	}
	public function getAssurance2RacAttribute(){
		return $this->rac_mt_ass;
	}
	public function getAssurance3RacAttribute(){
		return $this->rac_mt_ass;
	}
	public function getAssurancenRacAttribute(){
		return $this->rac_mt_ass;
	}
	public function getAssurancetRacAttribute(){
		return $this->rac_mt_ass * 4;
	}


	//--------------------- Calcul du loyer ------------------------------------------------------------------------
	public function getLoyer1RacAttribute(){
		return $this->getInteret1RacAttribute() + $this->getAmortissement1RacAttribute() + $this->getAssurance1RacAttribute();
	}
	public function getLoyer2RacAttribute(){
		return $this->getInteret2RacAttribute() + $this->getAmortissement2RacAttribute() + $this->getAssurance2RacAttribute();
	}
	public function getLoyer3RacAttribute(){
		return $this->getInteret3RacAttribute() + $this->getAmortissement3RacAttribute() + $this->getAssurance3RacAttribute();
	}
	public function getLoyernRacAttribute(){
		return $this->getInteretnRacAttribute() + $this->getAmortissementnRacAttribute() + $this->getAssurancenRacAttribute();
	}
	public function getLoyertRacAttribute(){
		return $this->getLoyer1RacAttribute() + $this->getLoyer2RacAttribute() + $this->getLoyer3RacAttribute() + $this->getLoyernRacAttribute();
	}

	//----------------------------------------------------------------------------------------------------------------//
	//                Remboursement par loyer constant                                                                //
	//----------------------------------------------------------------------------------------------------------------//

	//-------------------- Calcul du taux fictif -----------------------------------------------------------------------
	private function tf(){
		return $this->rlc_ti?1-pow((1+$this->rlc_ti),-$this->rlc_de)/$this->rlc_ti:0;
	}


	//----------------------- Calcul du taux fictif -------------------------------------------------------------------
	public function getRlcTfAttribute(){
		$exp = -1*$this->rlc_de;
		$b=1+$this->rlc_ti;

		//return $this->ras_pr?$this->ras_ti * $this->ras_vf / $this->ras_pr:0;
		return $this->rlc_ti?round((1- pow($b,$exp))/$this->rlc_ti,2):0;
	}



	//---------------------------- Calcul de l'annuite constante ------------------------------------------------------
	public function getAnnuiteConstRlcAttribute(){
		return $this->getRlcTfAttribute()?round($this->rlc_se/$this->getRlcTfAttribute(),3):0;
	}

	/*//---------------------------- Calcul de l'annuite constante -------------------------------------------------------
	public function getAnnuiteConstRlcAttribute(){
		return $this->tf()?round($this->rlc_se/$this->tf(),3):0;
	}*/

	//------------------------- Calcul des amortissements -------------------------------------------------------------

	public function getTab1(){
		$tab=[];
		$am =[]; //Amortissement
		$ly = []; //loyer
		$in = []; //interets
		$cap = []; //Capital
		$ass = []; //Assurance

		$cap[1] = $this->rac_se;
		$in[1] = $cap[1] * $this->rac_ti;
		$ass[1] = $this->rac_mt_ass;
		$am[1] = $this->rac_se/$this->rac_de;
		$ly[1] = $am[1]+$in[1] + $this->rac_mt_ass;


		$in[0] = $cap[1] * $this->rac_ti;
		$ass[0] = $this->rac_mt_ass;
		$am[0] = $this->rac_se/$this->rac_de;
		$ly[0] = $am[1]+$in[1] + $this->rac_mt_ass;

		for($i=2;$i<=$this->rac_de; $i++){
			$j=$i-1;
			$am[$i] = $this->rac_se/$this->rac_de;
			$cap[$i] = $cap[$j] - $am[$j];
			$in[$i] = $cap[$i] * $this->rac_ti;
			$in[0] = $in[0] + $in[$i];
			$ass[$i] = $this->rac_mt_ass;
			$ass[0] = $ass[0] + $ass[$i];

			$am[0] = $am[0] + $am[$i];
			$ly[$i] = $am[$i]+$in[$i] + $this->rac_mt_ass;
			$ly[0] = $ly[0] + $ly[$i];
		}

		$tab["capital"]= $cap;
		$tab["interets"]=$in;
		$tab["amortissement"]=$am;
		$tab["assurance"]=$ass;
		$tab["loyer"]=$ly;

		return $tab;
	}




	public function getTab2(){
		$tab=[];
		$am =[]; //Amortissement
		$ly = []; //loyer
		$in = []; //interets
		$cap = []; //Capital
		$ass = []; //Assurance

		$cap[1] = $this->rlc_se;
		$in[1] = $cap[1] * $this->rlc_ti;
		$ass[1] = $this->rlc_mt_ass;
		$ly[1] = $this->rlc_se/$this->getRlcTfAttribute() + $this->rlc_mt_ass;
		$am[1] = $ly[1] - $in[1];


		$in[0] = $cap[1] * $this->rlc_ti;
		$ass[0] = $this->rlc_mt_ass;
		$ly[0] = $this->rlc_se/$this->getRlcTfAttribute() + $this->rlc_mt_ass;
		$am[0] = $ly[1] - $in[1];

		for($i=2;$i<=$this->rlc_de; $i++){
			$j=$i-1;
			$cap[$i] = $cap[$j] - $am[$j];
			$in[$i] = $cap[$i] * $this->rlc_ti;
			$in[0]=$in[0] +$in[$i];
			$ass[$i] = $this->rlc_mt_ass;
			$ass[0] = $ass[0] + $ass[$i];
			$ly[$i] = $this->rlc_se/$this->getRlcTfAttribute() + $this->rlc_mt_ass;
			$ly[0]=$ly[0]+$ly[$i];
			$am[$i] = $ly[$i] - $in[$i];
			$am[0] = $am[0] + $am[$i];
		}

		$tab["capital"]= $cap;
		$tab["interets"]=$in;
		$tab["amortissement"]=$am;
		$tab["assurance"]=$ass;
		$tab["loyer"]=$ly;

		return $tab;
	}




	public function getAmortissement1RlcAttribute(){
		return $this->getAnnuiteConstRlcAttribute() - $this->getInteret1RlcAttribute();
	}
	public function getAmortissement2RlcAttribute(){
		return $this->getAnnuiteConstRlcAttribute() - $this->getInteret2RlcAttribute();
	}
	public function getAmortissement3RlcAttribute(){
		return $this->getAnnuiteConstRlcAttribute() - $this->getInteret3RlcAttribute();
	}
	public function getAmortissementnRlcAttribute(){
		return $this->getAnnuiteConstRlcAttribute() - $this->getInteretnRlcAttribute();
	}

	public function getAmortissementtRlcAttribute(){
		return $this->getAmortissementnRlcAttribute() + $this->getAmortissement3RlcAttribute() + $this->getAmortissement2RlcAttribute() + $this->getAmortissement1RlcAttribute();
	}

	//--------------------- Calcul du capital du en debut de periode ---------------------------------------------------
	public function getCapital1RlcAttribute(){
		return $this->rlc_se;
	}

	public function getCapital2RlcAttribute(){
		return $this->getCapital1RlcAttribute() - $this->getAmortissement1RlcAttribute();
	}

	public function getCapital3RlcAttribute(){
		return $this->getCapital2RlcAttribute() - $this->getAmortissement2RlcAttribute();
	}

	public function getCapitalnRlcAttribute(){
		return $this->getAmortissementnRlcAttribute()/(1+$this->rlc_ti);
	}

	//--------------------- Calcul de l'interet ------------------------------------------------------------------------
	public function getInteret1RlcAttribute(){
		return round($this->getCapital1RlcAttribute() * $this->rlc_ti,3);
	}

	public function getInteret2RlcAttribute(){
		return round($this->getCapital2RlcAttribute() * $this->rlc_ti,3);
	}
	public function getInteret3RlcAttribute(){
		return round($this->getCapital3RlcAttribute() * $this->rlc_ti,3);
	}

	public function getInteretnRlcAttribute(){
		return round($this->getCapitalnRlcAttribute() * $this->rlc_ti,3);
	}

	public function getInterettRlcAttribute(){
		return $this->getInteret1RlcAttribute() + $this->getInteret2RlcAttribute() + $this->getInteret3RlcAttribute() + $this->getInteretnRlcAttribute();
	}
	//----------------------------------- Calcul de l'assurance --------------------------------------------------------
	public function getAssurance1RlcAttribute(){
		return $this->rlc_mt_ass;
	}
	public function getAssurance2RlcAttribute(){
		return $this->rlc_mt_ass;
	}
	public function getAssurance3RlcAttribute(){
		return $this->rlc_mt_ass;
	}
	public function getAssurancenRlcAttribute(){
		return $this->rlc_mt_ass;
	}
	public function getAssurancetRlcAttribute(){
		return $this->rlc_mt_ass * 4;
	}


	//--------------------- Calcul du loyer ------------------------------------------------------------------------
	public function getLoyer1RlcAttribute(){
		return $this->getInteret1RlcAttribute() + $this->getAmortissement1RlcAttribute() + $this->getAssurance1RlcAttribute();
	}
	public function getLoyer2RlcAttribute(){
		return $this->getInteret2RlcAttribute() + $this->getAmortissement2RlcAttribute() + $this->getAssurance2RlcAttribute();
	}
	public function getLoyer3RlcAttribute(){
		return $this->getInteret3RlcAttribute() + $this->getAmortissement3RlcAttribute() + $this->getAssurance3RlcAttribute();
	}
	public function getLoyernRlcAttribute(){
		return $this->getInteretnRlcAttribute() + $this->getAmortissementnRlcAttribute() + $this->getAssurancenRlcAttribute();
	}
	public function getLoyertRlcAttribute(){
		return $this->getLoyer1RlcAttribute() + $this->getLoyer2RlcAttribute() + $this->getLoyer3RlcAttribute() + $this->getLoyernRlcAttribute();
	}

}
