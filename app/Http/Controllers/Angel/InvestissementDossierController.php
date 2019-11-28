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

	public function saveDoc(Request $request){

		//dd(public_path('img'));
		$projet = Investissement::where('token',$request->token)->first();

		$ordre = $request->doc_juridiqueUri;
		if($ordre){
			$ext = $ordre->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif','pdf');
			if(in_array($ext,$arr_ext)){
				$path = 'files/investissements/projets/docjuridiques';
				if (!file_exists(public_path())) {
					mkdir(public_path($path,777,true));
				}
				$path = $path.'/';
				if (file_exists(public_path($path) . $projet->token.'.' . $ext)) {
					unlink(public_path($path) . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$ordre->move(public_path($path), $name);
				Projet::updateOrCreate(['token'=>$projet->token],['doc_juridiqueUri'=>$name]);
			}

		}

		$pret = $request->pret;
		if($pret){
			$ext = $pret->getClientOriginalExtension();
			$arr_ext = array('doc','docx','pdf','odt');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('files'))){
					mkdir(public_path('files'));
				}
				if (!file_exists(public_path('files/contrats_pret'))) {
					mkdir(public_path('files/contrats_pret'));
				}

				if (file_exists(public_path('files/contrats_pret/') . $projet->token.'.' . $ext)) {
					unlink(public_path('files/contrats_pret/') . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$pret->move(public_path('files/contrats_pret'), $name);
				Projet::updateOrCreate(['token'=>$projet->token],['contrat_pretUri'=>$name]);
			}

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
