<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Bilan;
use App\Models\ChoicesProjet;
use App\Models\Devise;
use App\Models\Investissement;
use App\Models\Moi;
use App\Models\ProduitsProjet;
use App\Models\Projet;
use App\Models\Reportbilan;
use App\Models\Reportresultat;
use App\Models\Resultat;
use App\Models\Tags;
use App\Models\TagsProjet;
use App\Models\Tinvestissement;
use App\Models\Tprojet;
use App\Models\Variante;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prevbilan;
use App\Models\Prevresultat;
use App\Models\Prevtresorerie;
use PHPUnit\Framework\Exception;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dossiers = Projet::orderBy('created_at','desc')->where('owner_id',Auth::user()->id)->paginate(8);
        return view('/Owner/Dossiers/index')->with(compact('dossiers'));
    }

	public function getChoicesJson(Request $request){
		$projet = Projet::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
	}

	public function openDataroom($token){
		$invest = Investissement::updateOrCreate(['token'=>$token],['validated'=>1]);
		return back();
	}

	public function closeDataroom($token){
		$invest = Investissement::updateOrCreate(['token'=>$token],['validated'=>0]);
		return back();
	}

	public function createLetter($token){
		$invest = Investissement::where('token',$token)->first();
		$letter = $invest->lettre;
		if($letter){
			// Creating the new document...
			$phpWord = new \PhpOffice\PhpWord\PhpWord();

			/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
			$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...

			$section->addText(
				'La présente lettre d’intention décrit les principales conditions et '
				.'modalités selon lesquelles l’investissement envisagé dans le projet'. $invest->projet->name .'pourrait être réalisé. '
			);

			$section->addText(
				'Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. '
			);

			$section->addText(
				'Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour, et particulièrement du business plan qui ont été préparés par les Fondateurs.'
			);

			$section->addText(
				'Le montant total de l’investissement étant estimé à '. $invest->projet->montant .' ' . $invest->projet->devise->name.','
				.'je, soussigné, '. $invest->angel->name .', agissant pour'. $invest->lettre->personnel?' Mon propre compte':' le compte de '.$invest->angel->entreprise?$invest->angel->entreprise->name:$invest->angel->organisme->name .', manifeste le souhait de participer à cette opération
				sous forme de '. $invest->lettre->type->name .'  à hauteur de '.$invest->lettre->montant .' ' . $invest->lettre->devise->name
			);



			// Saving the document as OOXML file...
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			try{
				$objWriter->save(public_path('files/docs').'/Lettre_intention.docx');
			}catch (Exception $e){

			}

			return response()->download(public_path('files/docs').'/Lettre_intention.docx');


		}else{
			return back();
		}

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	    $villes = Ville::all()->where('pay_id',Auth::user()->pay_id);

	    $devises = Devise::all();

        return view('/Owner/Dossiers/create')->with(compact('villes','devises'));
    }

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 * edit a field with a new value
	 */

	public function editFieldJson(Request $request){
		$model = $request->model;
		$id = $request->id;
		$name = $request->name;
		$value = $request->value;
		$search = null;
		if($model=='Prevbilan'){
			$search = Prevbilan::find($id);
			$search->$name=$value;
			$search->save();
			return response()->json($search);
		}

		//dd($model);

		//$search = App\Models\$model::find($id);
		dd($search);
	}

	public function addTags(Request $request){
		//dd(public_path('img'));

		$projet = Projet::where('token',$request->projet_token)->first();
		$tag = TagsProjet::all()->where('tag_id',$request->tag_id)->where('projet_id',$projet->id)->first();
		if(!$tag){
			$tag = new TagsProjet();
			$tag->tag_id = $request->tag_id;
			$tag->projet_id = $projet->id;
			$tag->save();
		}
		return back();
	}


	public function editReport(Request $request){
		//dd(public_path('img'));

		$projet = Projet::where('token',$request->projet_token)->first();
		$resultat = ['ca','cf','cv','ape','pi','ps','sp','taxes','dap','impots','pf','cfi','ce','pe','salaires','participations'];
		$rs = $resultat;
		$rs[] = 'moi_id';
		$inputs = $request->only($rs);
		$inputs['annee']=date('Y');
		$inputs['projet_id']=$projet->id;
		$inputs['token']=sha1(Auth::user()->id. date('Yhmids'));
		$inputs['user_id'] = Auth::user()->id;
		$reportrslt = Reportresultat::updateOrCreate(['projet_id'=>$projet->id,'moi_id'=>$request->moi_id,'annee'=>date('Y')],$inputs);
		$resultat[]='projet_token';
		$inputs = $request->except($resultat);
		$inputs['annee']=date('Y');
		$inputs['projet_id']=$projet->id;
		$inputs['token']=sha1(Auth::user()->id. date('Yhmids'));
		$inputs['user_id'] = Auth::user()->id;
		$reportbilan = Reportbilan::updateOrCreate(['projet_id'=>$projet->id,'moi_id'=>$request->moi_id,'annee'=>date('Y')],$inputs);
		return back();
	}


	public function uploadImage(Request $request){

		//dd(public_path('img'));
		$projet = Projet::where('token',$request->projet_token)->first();
		$file = $request->imageUri;
		$ext = $file->getClientOriginalExtension();
		$arr_ext = array('jpg','png','jpeg','gif');
		if(in_array($ext,$arr_ext)){
			if(!file_exists(public_path('img').'/projets')){
				mkdir(public_path('img').'/projets');
			}
			//dd($projet);
			if(file_exists(public_path('img').'/projets/'.$projet->token.'.'.$ext)){
				unlink(public_path('img').'/projets/'.$projet->token.'.'.$ext);
			}
			$name = $projet->token.'.'.$ext;
			$file->move(public_path('img/projets'), $name);
			//move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'membres'.DS.$name.'.'.$ext);
			$projet->imageUri = 'projets/'.$name;
			$projet->save();
		}
		return redirect()->back();
	}

	/*
	 *  Chargement de l'ordre de virement
	 */

	public function editDocs(Request $request){

		//dd(public_path('img'));
		$projet = Projet::where('token',$request->projet_token)->first();

		$ordre = $request->ordre;
		if($ordre){
			$ext = $ordre->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif','pdf');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('files'))){
					mkdir(public_path('files'));
				}
				if (!file_exists(public_path('files/ordres_virement'))) {
					mkdir(public_path('files/ordres_virement'));
				}

				if (file_exists(public_path('files/ordres_virement/') . $projet->token.'.' . $ext)) {
					unlink(public_path('files/ordres_virement/') . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$ordre->move(public_path('files/ordres_virement'), $name);
				Projet::updateOrCreate(['token'=>$projet->token],['ordrevirementUri'=>$name]);
			}

		}

		$pacte = $request->pacte;
		if($pacte){
			$ext = $pacte->getClientOriginalExtension();
			$arr_ext = array('odt','docx','doc','pdf');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('files'))){
					mkdir(public_path('files'));
				}
				if (!file_exists(public_path('files/pactes_actionnaires'))) {
					mkdir(public_path('files/pactes_actionnaires'));
				}

				if (file_exists(public_path('files/pactes_actionnaires/') . $projet->token.'.' . $ext)) {
					unlink(public_path('files/pactes_actionnaires/') . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$pacte->move(public_path('files/pactes_actionnaires'), $name);
				Projet::updateOrCreate(['token'=>$projet->token],['pacte_associesUri'=>$name]);
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


	// Premiere sauvegarde du dossier

	public function initJson(Request $request){


		///dd($request->all());
		$dossier = json_decode($request->all()['dossier'],true);
		$answers = isset($request->all()['answers'])?json_decode($request->all()['answers'],true):null;
		$produits = isset($request->all()['produits'])?json_decode($request->all()['produits'],true):null;

		//$dossier = $request->all()['dossier'];

		$dossier['moi_id'] = date('m');
		$dossier['annee'] = date('Y');
		$dossier['author_id']= Auth::user()->id;
		$dossier['owner_id']=Auth::user()->id;
		$dossier['description_modele_economique'] = isset($request->all()['bm'])?$request->bm:'';
		$token = sha1(date('ymdhs').$dossier['owner_id']);
		$dossier['token'] = $token;

		$file = $request->imageUri;
		if($file){
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('img').'/projets')){
					mkdir(public_path('img').'/projets');
				}
				//dd($projet);
				if(file_exists(public_path('img').'/projets/'.$token.'.'.$ext)){
					unlink(public_path('img').'/projets/'.$token.'.'.$ext);
				}
				$name = $token.'.'.$ext;
				$file->move(public_path('img/projets'), $name);
				//move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'membres'.DS.$name.'.'.$ext);
				$dossier['imageUri'] = 'projets/'.$name;
			}
		}

		//$answers = isset($request->all()['answers'])?$request->all()['answers']:null;
		//$produits = isset($request->all()['produits'])?$request->all()['produits']:null;

		/*$dossier = $request->all()['dossier'];
		$dossier['moi_id'] = date('m');
		$dossier['annee'] = date('Y');
		$dossier['author_id']= Auth::user()->id;
		$dossier['owner_id']=Auth::user()->id;
		$dossier['description_modele_economique'] = $request->all()['bm'];
		$dossier['capital'] = isset($dossier['capital'])?1:0;
		$dossier['token'] = sha1(date('ymdhs').$dossier['owner_id']);*/
		$dossier = Projet::create($dossier);
		if($dossier){
			$bilan1 = isset($request->all()['bil1'])?json_decode($request->all()['bil1'],true):null;
			$bilan2 = isset($request->all()['bil2'])?json_decode($request->all()['bil2'],true):null;
			$bilan3 = isset($request->all()['bil3'])?json_decode($request->all()['bil3'],true):null;
			$res1 = isset($request->all()['compte1'])?json_decode($request->all()['compte1'],true):null;
			$res2 = isset($request->all()['compte2'])?json_decode($request->all()['compte2'],true):null;
			$res3 = isset($request->all()['compte3'])?json_decode($request->all()['compte3'],true):null;
			if($bilan1){
				//$bilan1 = $request->all()['bil1'];
				$bilan1['annee'] = date('Y') -1;
				$bilan1['moi_id'] = date('m');
				$bilan1['projet_id'] = $dossier->id;
				$bilan1['user_id'] =Auth::user()->id;
				$bilan1 = Bilan::create($bilan1);
			}

			if($bilan2){
				//$bilan2 = $request->all()['bil2'];
				$bilan2['annee'] = date('Y') -2;
				$bilan2['moi_id'] = date('m');
				$bilan2['projet_id'] = $dossier->id;
				$bilan2['user_id'] =Auth::user()->id;
				$bilan2 = Bilan::create($bilan2);
			}

			if($bilan3){
				//$bilan2 = $request->all()['bil3'];
				$bilan3['annee'] = date('Y') -3;
				$bilan3['moi_id'] = date('m');
				$bilan3['projet_id'] = $dossier->id;
				$bilan3['user_id'] =Auth::user()->id;
				$bilan3 = Bilan::create($bilan3);
			}

			if($res1){
				//$res1 = $request->all()['compte1'];
				$res1['annee'] = date('Y') -1;
				$res1['moi_id'] = date('m');
				$res1['projet_id'] = $dossier->id;
				$res1['token'] =sha1(date('yhdmis').Auth::user()->id);
				$result = Resultat::create($res1);
			}

			if($res2){
				//$res1 = $request->all()['compte2'];
				$res2['annee'] = date('Y') -2;
				$res2['moi_id'] = date('m');
				$res2['projet_id'] = $dossier->id;
				$res2['token'] =sha1(date('yhdims').Auth::user()->id);
				$result = Resultat::create($res2);
			}

			if($res3){
				//$res1 = $request->all()['compte3'];
				$res3['annee'] = date('Y') -3;
				$res3['moi_id'] = date('m');
				$res3['projet_id'] = $dossier->id;
				$res3['token'] =sha1(date('myhsiyd').Auth::user()->id);
				$result = Resultat::create($res3);
			}

			if($produits){
				for($i = 0; $i<count($produits);$i++){
					$dp = new ProduitsProjet();
					//$dp->produi_id =
					$dp->produit_id = $produits[$i];
					$dp->projet_id = $dossier->id;
					$dp->save();
				}
			}


			if($answers){
				foreach($answers as $answer){
					$an= new ChoicesProjet();
					$an->choice_id=$answer['choice_id'];
					$an->projet_id=$dossier->id;
					$an->save();
				}
			}


		}

		return response()->json($dossier->token);
		//dd($request->all());
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
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
		$tags = Tags::all();
	    $projet = Projet::where(['token'=>$token])->first();
	    $mois = Moi::all();
	    //dd($dossier->bilans);
	    return view('Owner/Dossiers/show')->with(compact('projet','tags','mois'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
