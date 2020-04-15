<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use App\Models\Depense;
use App\Models\Moi;
use Illuminate\Support\Facades\Auth;


class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $moi_id = request('moi_id')?request('moi_id'):date('m');
	    $annee = request('annee')?request('annee'):date('Y');
	    $mois = Moi::all();

	    $bulletins = Bulletin::all()->where('moi_id',$moi_id)->where('annee',$annee);
	    return view('Rf/Salaires/index')->with(compact('bulletins','annee','moi_id','mois'));
    }

	public function show($token)
	{
		//
		$bulletin = Bulletin::where('token',$token)->first();
		return view('Rf/Bulletins/show')->with(compact('bulletin'));
	}


	public function addPaiement(){

		$facture = Bulletin::where('token',request('id'))->first();
		if($facture) {
			if(request('montant') <= $facture->montant  ) {
				$paiement = Depense::create(['name' => str_pad(date('ydm') . $facture->owner_id, 10, '0', STR_PAD_LEFT), 'user_id' => Auth::user()->id,
					'montant' => request('montant'),'jour'=>new \DateTime(),
					'token' => sha1(Auth::user()->id . date('Ymdhis')), 'moi_id' => date('m'), 'annee' => date('Y'), 'semaine' => date('W'), 'bulletin_id' => $facture->id
				]);

				request()->session()->flash('success', 'Paiement enregistré !!!');
			}else{
				request()->session()->flash('danger', 'Echec paiement. Montant superieur au solde !!!');
			}
			return redirect()->back();

		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


}
