<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concession;
use App\Models\Infrastructure;
use App\Models\Investissement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Exception;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $infrastructures = Infrastructure::orderBy('created_at','desc')->paginate(10);
	    return view('/Admin/Infrastructures/index')->with(compact('infrastructures'));
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
    }

	/**
	 * Validation du premier paiement
	 */

	public function validateDiagInterne(Request $request, $token){

		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>1]);
		$request->session()->flash('success','Premier paiement enregistré avec succès!!!');

		return redirect()->back();
	}

	/**
	 * Validation du deuxieme paiement
	 */

	public function validateDiagExterne(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>2]);
		$request->session()->flash('success','Deuxieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/**
	 * Validation du troisieme paiement
	 */

	public function validateDiagStrategique(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>3]);
		$request->session()->flash('success','Troisieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}


	/**
	 * Validation du quatrieme paiement
	 */

	public function validateMontageFinancier(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>4]);
		$request->session()->flash('success','Quatrieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Bloquer le dossier
	 */
	public function disable(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['active'=>0]);
		$request->session()->flash('warning','Dossier bloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Debloquer le dossier
	 */
	public function enable(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['active'=>1]);
		$request->session()->flash('success','Dossier débloqué avec succès!!!');
		return redirect()->back();
	}

	
	
	
	
	
	/*
	 * Publication de l'appel d'offre
	 */

	public function publish(Request $request){

		//dd(public_path('img'));
		$projet = Infrastructure::where('token',$request->token)->first();
		$file = $request->appelUril;
		$ext = $file->getClientOriginalExtension();
		$arr_ext = array('jpg','png','jpeg','gif','pdf');
		if(in_array($ext,$arr_ext)){
			if(!file_exists(public_path('file').'/infrastructures')){
				mkdir(public_path('file').'/infrastructures');
			}
			//dd($projet);
			if(file_exists(public_path('file').'/infrastructures/'.$projet->token.'.'.$ext)){
				unlink(public_path('file').'/infrastructures/'.$projet->token.'.'.$ext);
			}
			$name = $projet->token.'.'.$ext;
			$file->move(public_path('file/infrastructures'), $name);
			//move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'membres'.DS.$name.'.'.$ext);
			$projet->appelUri = 'infrastructures/'.$name;
			$projet->published=1;
			$projet->published_at = new \DateTime();
			$projet->save();
			$request->session()->flash('success','Appel d\'offre enregistré!!!');
		}
		return redirect()->back();
	}
	
	
	
	
	/*
	 * Remise des dossiers de prequalification
	 */
	public function receive(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['received'=>1,'received_at'=> new \DateTime()]);
		$request->session()->flash('success','Remise des dossiers de préqualification faite avec succès!!!');
		return redirect()->back();
	}


	/*
	 * Remise des dossiers de prequalification
	 */
	public function selectConsortia(Request $request){
		$concessions = $request->concessions;
		foreach($concessions as $concession){
			$cons= Concession::updateOrCreate(['token'=>$concession['token'],'selected'=>1,'selected_at'=>new \DateTime(), 'selctor_id'=>Auth::user()->id]);
		}
		Infrastructure::updateOrCreate(['token'=>$request->token],['consortia_selected'=>1,'consortia_selected_at'=> new \DateTime()]);
		$request->session()->flash('success','	Choix des consortia retenus fait avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Remise premiere offre
	 */
	public function remiseFirst(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['first_rendered'=>1,'first_rendered_at'=> new \DateTime()]);
		$request->session()->flash('success','Remise de la première offre faite avec succès!!!');
		return redirect()->back();
	}


	/*
	 * Sélection des Preffered bidders
	 */
	public function selectBidders(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['bidders_selected'=>1,'bidders_selected_at'=> new \DateTime()]);
		$request->session()->flash('success','Sélection des Preffered bidders faite avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Remise de la Best And Final Offer
	 */
	public function remiseFinal(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['final_rendered'=>1,'final_rendered_at'=> new \DateTime()]);
		$request->session()->flash('success','Remise de la Best And Final Offer faite avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Choix du concessionnaire pressenti
	 */
	public function selectConcessionnaire(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
		$projet->concessionnaire_id = $request->angel_id;
		$projet->save();
		$request->session()->flash('success','Choix concessionnaire pressenti fait avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Financial Close et Signature de contrat
	 */
	public function signature(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['signed'=>1,'signed_at'=> new \DateTime()]);
		$request->session()->flash('success','Financial Close et Signature de contrat  faite avec succès!!!');
		return redirect()->back();
	}








	/*
	 *
	 */
	public function closeDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>0]);
		$request->session()->flash('success',' Fermeture de la documentation juridique!!!');
		return redirect()->back();
	}

	public function openDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>1]);
		$request->session()->flash('success',' Ouverture de la documentation juridique!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function validateOrdre(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>1]);
		$request->session()->flash('success',' Ordre de virement validé!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function unvalidateOrdre(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>0]);
		$request->session()->flash('warning',' Ordre de virement rejeté!!!');
		return redirect()->back();
	}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Infrastructure::where('token',$token)->first();

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Infrastructures/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Infrastructure::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}



	public function getChoicesJson(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
