<?php

namespace App\Http\Controllers\Rf;
use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Tdepense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $debut = request('debut');
	    $fin = request('fin');

	    if($debut && $fin){
		    $depenses = Depense::all()->whereBetween('jour',[$debut,$fin])->sortByDesc('created_at');
		   // return view('Rf/Depenses/index')->with(compact('depenses'));
	    }else{
		    $depenses = Depense::all()->where('moi_id',date('m'))->sortByDesc('created_at');
	    }

	    $types = Tdepense::all();


	    return view('Rf/Depenses/index')->with(compact('depenses','types'));
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
		$depense = Depense::where('token',$token)->first();
		return view('Rf/Depenses/show')->with(compact('depense'));
	}

	public function store(){
			$jour = new \DateTime(request('jour'));

			$paiement = Depense::create(['name' => str_pad(date('ymWdhis'), 15, '0', STR_PAD_LEFT), 'user_id' => Auth::user()->id,
				'jour' => request('jour'),'montant'=>request('montant'),'motif'=>request('motif'),'tdepense_id'=>request('tdepense_id'),
				'token' => sha1(Auth::user()->id . date('Ymdhis')), 'moi_id' => $jour->format('m'), 'annee' => $jour->format('Y'),'semaine'=>$jour->format('W')
			]);

			request()->session()->flash('success','Dépense enregistrée !!!');

			return redirect()->back();


	}



}
