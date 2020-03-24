<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cligne extends Model
{
    //

	protected $guarded = [];
	protected $dates = ['debut','fin'];
	public $timestamps = false;


	public function commande(){
		return $this->belongsTo('App\Models\Commande');
	}

	public function poste(){
		return $this->belongsTo('App\Models\Poste');
	}

	public function livraisons(){
		return $this->hasMany('App\Models\Livraison');
	}


	public function getEtatAttribute(){
		$livraisons = Livraison::all()->where('cligne_id',$this->id);
		$data =[];
		if($livraisons->count()==$this->quantity){
			$data['color']='success';
			$data['value']=$this->quantity;
			$data['level']=3;
			$data['progress']=100;
		}else{
			if($livraisons->count()>0){
				$data['color']='primary';
				$data['value']=$livraisons->count();
				$data['progress'] = round(($livraisons->count()/$this->quantity)*100,1);
				$data['level']=2;
			}else{
				$data['color']='danger';
				$data['value']=0;
				$data['progress'] = 0;
				$data['level']=1;
			}
		}

		return $data;
	}

	public function getLevelAttribute(){
		$level = [];
		$commande = Commande::find($this->commande_id);
		$secteurs = DB::table('clients_secteurs')->where(['client_id'=>$commande->client_id])->get(['secteur_id']);

		if($secteurs->where('secteur_id',$this->secteur_id)->count()){
			$level['name'] = 'sensible';
			$level['color'] ='warning';
		}else{
			$level['name'] = 'souple';
			$level['color'] = 'info';
		}

		return $level;
	}

}
