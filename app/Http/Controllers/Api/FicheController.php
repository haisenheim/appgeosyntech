<?php

namespace App\Http\Controllers\Api;

use App\Models\Bulletin;
use App\Models\Facture;
use App\Models\Fiche;
use App\Models\Livraison;
use App\Models\Moi;
use App\Models\Pointage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	   //dd(Auth);

	    if (Auth::user()) {

		    $user = Auth::user();
		    //$livraisons = Livraison::all()->where('client_id',$user->client_id)->where('fin','>',Carbon::today());
		    //dd($livraisons);
		   // dd(sha1($user->id . date('Ymdhis')));
		    $fiche = Fiche::create(['name'=>str_pad(date('ydm').$user->client_id,10,'0',STR_PAD_LEFT),'jour'=>new \DateTime(), 'user_id'=>$user->id, 'client_id'=>$user->client_id,
		        'token'=>sha1($user->id . date('Ymdhis')), 'moi_id'=>date('m'),'annee'=>date('Y')
		    ]);

		    $facture = Facture::where('client_id',$user->client_id)->where('moi_id',date('m'))->where('annee',date('Y'))->first();
		    if(!$facture){
			    $facture = Facture::create(['name'=>str_pad(date('ydm').$user->client_id,10,'0',STR_PAD_LEFT),'moi_id'=>date('m'),'annee'=>date('Y'),
				    'token'=>sha1($user->id . date('Ymdhis')), 'client_id'=>$user->client_id
			    ]);
		    }
		    if($fiche){
			    $livraisons = Livraison::all()->where('client_id',$user->client_id)->where('fin','>',Carbon::today());
			    foreach($livraisons as $livraison){
				    $bulletin = Bulletin::where('user_id',$livraison->user_id)->where('moi_id',date('m'))->where('annee',date('Y'))->first();
				    if(!$bulletin){
					    $bulletin = Bulletin::create(['user_id'=>$livraison->user_id,'moi_id'=>date('m'),'annee'=>date('Y'),
						    'token'=>sha1($user->id.date('ymdsih').$livraison->user_id),
						    'name'=>str_pad(date('ydm').$livraison->user_id,10,'0',STR_PAD_LEFT),
						    'livraison_id'=>$livraison->id
					    ]);
				    }
				    Pointage::create([
					    'bulletin_id'=>$bulletin->id, 'livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id,
				        'fiche_id'=>$fiche->id,'moi_id'=>date('m'),'facture_id'=>$facture->id,
					    'annee'=>date('Y'),'token'=>sha1($fiche->id . $livraison->user_id . $livraison->id. date('Ymdhsi'))
				    ]);
			    }
		    }

		    return response()->json([
			    'success' => true,
			    'message' => 'Fche créée avec succès !!!',
			    'fiche'=>$fiche
		    ]);
	    }else {
		    return response()->json([
			    'success' => false,
			    'message' => 'Impossible de creer la fiche'
		    ]);
	    }



    }


	public function getMonths(){
		if (Auth::user()) {

			$user = Auth::user();
			// dd(sha1($user->id . date('Ymdhis')));
			$months = Moi::all();

			return response()->json([
				'success' => true,
				'message' => 'Toutes les fiches par mois !!!',
				'fiche'=>$months
			]);
		}else {
			return response()->json([
				'success' => false,
				'message' => 'Impossible de charger les mois'
			]);
		}
	}

	public function getFichesByMonth(){
		if (Auth::user()) {

			$fiches = Fiche::all()->where('moi_id',request('id'));
			$month = Moi::find(request('id'));
			return response()->json([
				'success' => true,
				'message' => 'Toutes les fiches par mois !!!',
				'fiches'=>$fiches,
				'month'=>$month
			]);
		}else {
			return response()->json([
				'success' => false,
				'message' => 'Impossible de charger les fiches'
			]);
		}
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
