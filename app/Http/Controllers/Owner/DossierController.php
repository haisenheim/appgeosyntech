<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Bilan;
use App\Models\ChoicesProjet;
use App\Models\Investissement;
use App\Models\ProduitsProjet;
use App\Models\Projet;
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
		$projet = Projet::find($request->id);
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
        //
        $tprojets = Tprojet::all();
        //$tinvestissements = Tinvestissement::all();
        //$variantes = Variante::all();
	    $villes = Ville::all();

	    $variantes = Variante::all();

        return view('/Owner/Dossiers/create')->with(compact('tprojets','villes','variantes'));
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

	public function uploadOv(Request $request){

		//dd(public_path('img'));
		$projet = Projet::where('token',$request->projet_token)->first();
		$file = $request->ordre;
		$ext = $file->getClientOriginalExtension();
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
			$name =  $projet->token . $ext;
			$file->move(public_path('files/ordres_virement'), $name);
			Projet::updateOrCreate(['token'=>$projet->token],['ordrevirementUri'=>$name]);
		}

		return redirect()->back();

	}


	// Premiere sauvegarde du dossier

	public function initJson(Request $request){
		//$dossier = new Projet();

		//dd($request->all());
		$answers = isset($request->all()['answers'])?$request->all()['answers']:null;
		$produits = isset($request->all()['produits'])?$request->all()['produits']:null;

		$dossier = $request->all()['dossier'];
		$dossier['moi_id'] = date('m');
		$dossier['annee'] = date('Y');
		$dossier['author_id']= Auth::user()->id;
		$dossier['owner_id']=Auth::user()->id;
		$dossier['description_modele_economique'] = $request->all()['bm'];
		$dossier['capital'] = isset($dossier['capital'])?1:0;
		$dossier['token'] = sha1(date('ymdhs').$dossier['owner_id']);
		$dossier = Projet::create($dossier);
		if($dossier){
			if(!empty($request->all()['bil1']['stocks'])){
				$bilan1 = $request->all()['bil1'];
				$bilan1['annee'] = date('Y') -1;
				$bilan1['moi_id'] = date('m');
				$bilan1['projet_id'] = $dossier->id;
				$bilan1['user_id'] =Auth::user()->id;
				$bilan1 = Bilan::create($bilan1);
			}

			if(!empty($request->all()['bil2']['stocks'])){
				$bilan2 = $request->all()['bil2'];
				$bilan2['annee'] = date('Y') -2;
				$bilan2['moi_id'] = date('m');
				$bilan2['projet_id'] = $dossier->id;
				$bilan2['user_id'] =Auth::user()->id;
				$bilan2 = Bilan::create($bilan2);
			}

			if(!empty($request->all()['bil3']['stocks'])){
				$bilan2 = $request->all()['bil3'];
				$bilan2['annee'] = date('Y') -3;
				$bilan2['moi_id'] = date('m');
				$bilan2['projet_id'] = $dossier->id;
				$bilan2['user_id'] =Auth::user()->id;
				$bilan3 = Bilan::create($bilan2);
			}

			if(!empty($request->all()['compte1']['ca'])){
				$res1 = $request->all()['compte1'];
				$res1['annee'] = date('Y') -1;
				$res1['moi_id'] = date('m');
				$res1['projet_id'] = $dossier->id;
				$res1['token'] =sha1(date('yhdmis').Auth::user()->id);
				$result = Resultat::create($res1);
			}

			if(!empty($request->all()['compte2']['ca'])){
				$res1 = $request->all()['compte2'];
				$res1['annee'] = date('Y') -2;
				$res1['moi_id'] = date('m');
				$res1['projet_id'] = $dossier->id;
				$res1['token'] =sha1(date('yhdims').Auth::user()->id);
				$result = Resultat::create($res1);
			}

			if(!empty($request->all()['compte3']['ca'])){
				$res1 = $request->all()['compte3'];
				$res1['annee'] = date('Y') -3;
				$res1['moi_id'] = date('m');
				$res1['projet_id'] = $dossier->id;
				$res1['token'] =sha1(date('myhsiyd').Auth::user()->id);
				$result = Resultat::create($res1);
			}



			for($i = 0; $i<count($produits);$i++){
				$dp = new ProduitsProjet();
				//$dp->produi_id =
				$dp->produit_id = $produits[$i];
				$dp->projet_id = $dossier->id;
				$dp->save();
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
	    //dd($dossier->bilans);
	    return view('Owner/Dossiers/show')->with(compact('projet','tags'));
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
