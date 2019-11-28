<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Flettre;
use App\Models\Investissement;
use App\Models\Lettre;
use App\Models\Projet;
use App\Models\Tletrre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestissementDossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $investissements = Investissement::orderBy('created_at','desc')->where('projet_id','>',0)->where('angel_id',Auth::user()->id)->paginate(8);
	    return view('Angel/Investissements/Projets/index')->with(compact('investissements'))->with('Liste des investissements');
    }

	public function saveLetter(Request $request){
		$projet = Investissement::where('token', $request->token)->first();
		if($projet->lettre){
			$lettre = $projet->lettre;
			$data = [];
			//$data['id']=$lettre->id;
			$data['type_remboursement']= $request->type_remboursement;
			$data['forme_id'] = $request->forme_id;
			$data['montant'] = $request->montant;
			$data['pct_participation']=$request->pct_participation;
			$data['pct_engagement']=$request->pct_engagement;
			$data['duree_engagement']=$request->duree_engagement;
			$data['mt_engagement']=$request->mt_engagement;

			$data['personnel']=$request->personnel;
			$data['pct_pret']=$request->pct_pret;
			$data['duree_pret']=$request->duree_pret;
			$data['lieu'] = $request->lieu;
			Lettre::updateOrCreate(['investissement_id'=>$lettre->investissement_id],$data);
		}else{
			$lettre =new Lettre();
			$lettre->investissement_id = $projet->id;
			$lettre->type_remboursement= $request->type_remboursement;
			$lettre->forme_id = $request->forme_id;
			$lettre->montant = $request->montant;
			$lettre->pct_participation=$request->pct_participation;
			$lettre->pct_engagement=$request->pct_engagement;
			$lettre->duree_engagement=$request->duree_engagement;
			$lettre->mt_engagement=$request->mt_engagement;

			$lettre->personnel=$request->personnel;
			$lettre->pct_pret=$request->pct_pret;
			$lettre->duree_pret=$request->duree_pret;
			$lettre->lieu = $request->lieu;
			$lettre->save();
		}

		return back();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	    $projet = Projet::where('token',$request->token)->first();
	    if($projet){
		    $inv = Investissement::create([
			    'rencontre'=>$request->dt_rdv,
			    'projet_id'=>$projet->id,
			    'angel_id'=>Auth::user()->id,
			    'entreprise_id'=>Auth::user()->entreprise_id,
			    'organisme_id'=>Auth::user()->organisme_id,
			    'token'=>sha1(Auth::user()->id . date('Yhmdis'))
		    ]);
		    //$request->session()->flash('success','Votre investissement a été correctement initialisée !!!');
	    }
			return response()->json($projet);
	    //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
	    $formes =Flettre::all();
	    $investissement = Investissement::where('token',$token)->first();
	    return view('Angel/Investissements/Projets/show')->with(compact('investissement','formes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Investissement $investissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investissement $investissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investissement $investissement)
    {
        //
    }
}
