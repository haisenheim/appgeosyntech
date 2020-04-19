<?php

namespace App\Http\Controllers\Rf;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Delai;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $factures = Bill::all()->sortByDesc('created_at');
	    return view('Rf/Bills/index')->with(compact('factures'));
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



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//
		$facture = Bill::where('token',$token)->first();
		$delais = Delai::all();
		return view('Rf/Bills/show')->with(compact('facture','delais'));
	}

	public function addPaiement(){

		$facture = Bill::where('token',request('id'))->first();
		if($facture) {

			$paiement = Depense::create(['name' => str_pad(date('ydm') . $facture->partenaire_id, 10, '0', STR_PAD_LEFT), 'user_id' => Auth::user()->id,
				'montant'=>request('montant'),'jour'=>new \DateTime(),
				'token' => sha1(Auth::user()->id . date('Ymdhis')), 'moi_id' => date('m'), 'annee' => date('Y'),'semaine'=>date('W'),'bill_id'=>$facture->id
			]);

			request()->session()->flash('success','Paiement enregistré !!!');

			return redirect()->back();

		}else{
			request()->session()->flash('danger','Facture inconnue !!!');

			return redirect()->back();
		}
	}

	public function addDelai(){

		$facture = Bill::where('token',request('id'))->first();
		if($facture) {

			$facture->delai_id = request('delai_id');
			$facture->save();

			request()->session()->flash('success','Paiement enregistré !!!');

			return redirect()->back();

		}else{
			request()->session()->flash('danger','Facture inconnue !!!');

			return redirect()->back();
		}
	}





}
