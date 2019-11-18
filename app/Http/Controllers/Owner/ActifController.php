<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Bilan;
use App\Models\Cession;
use App\Models\ChoicesProjet;
use App\Models\ProduitsProjet;
use App\Models\Projet;
use App\Models\Resultat;
use App\Models\Tactif;
use App\Models\Tags;
use App\Models\TagsProjet;

use App\Models\Tprojet;
use App\Models\Variante;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $tactifs = Tactif::all();
	    $villes = Ville::all();
        $dossiers = Actif::orderBy('created_at','desc')->where('owner_id',Auth::user()->id)->paginate(12);
        return view('/Owner/Actifs/index')->with(compact('dossiers','tactifs','villes'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tactifs = Tactif::all();
        //$tinvestissements = Tinvestissement::all();
        //$variantes = Variante::all();
	    $villes = Ville::all();

        return view('/Owner/Actifs/create')->with(compact('tactifs','villes'));
    }

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 * edit a field with a new value
	 */



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




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	   // dd($request);
	    $token = sha1(date('ydmhis') . Auth::user()->id);
	    $actif = new Actif();
        $actif->name = $request['name'];
        $actif->ville_id = $request['ville_id'];
	    $actif->tactif_id = $request['tactif_id'];
	    $actif->description = $request['description'];
	    $actif->caracteristiques = $request['caracteristiques'];
	    $actif->prix = $request['prix'];
	    $actif->owner_id = Auth::user()->id;
	    $actif->token = $token;
	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/actifs')) {
				    mkdir(public_path('img') . '/actifs');
			    }

			    if (file_exists(public_path('img') . '/actifs/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/actifs/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/actifs'), $name);
			    $actif->imageUri = 'actifs/' . $name;
		    }

	    }

        $actif->save();
	    $request->session()->flash('success','L\'article a été correctement enregistré !!!');
	    return redirect('/owner/actifs');
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
	    $projet = Actif::where(['token'=>$token])->first();
	    //dd($dossier->bilans);
	    $tactifs = Tactif::all();
	    $villes = Ville::all();
	    return view('Owner/Actifs/show')->with(compact('projet','tags','tactifs','villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        //
	    $actif = Actif::where(['token'=>$token])->first();
	   // dd($actif);
	    $tactifs = Tactif::all();
	    $villes = Ville::all();
	    return view('Owner/Actifs/edit')->with(compact('actif','villes','tactifs'));
    }



	public function editDocs(Request $request){

		//dd(public_path('img'));
		$projet = Actif::where('token',$request->projet_token)->first();

		$ordre = $request->ordre;
		if($ordre){
			$ext = $ordre->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif','pdf');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('files'))){
					mkdir(public_path('files'));
				}
				if(!file_exists(public_path('files/cessions'))){
					mkdir(public_path('files/cessions'));
				}
				if (!file_exists(public_path('files/cessions/ordres_virement'))) {
					mkdir(public_path('files/cessions/ordres_virement'));
				}

				if (file_exists(public_path('files/cessions/ordres_virement/') . $projet->token.'.' . $ext)) {
					unlink(public_path('files/cessions/ordres_virement/') . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$ordre->move(public_path('files/cessions/ordres_virement'), $name);
				Actif::updateOrCreate(['token'=>$projet->token],['ordrevirementUri'=>$name]);
			}

		}



		$pret = $request->actif;
		if($pret){
			$ext = $pret->getClientOriginalExtension();
			$arr_ext = array('doc','docx','pdf','odt');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('files'))){
					mkdir(public_path('files'));
				}
				if(!file_exists(public_path('files/cessions'))){
					mkdir(public_path('files/cessions'));
				}
				if (!file_exists(public_path('files/cessions/actif'))) {
					mkdir(public_path('files/cessions/actif'));
				}

				if (file_exists(public_path('files/cessions/actif/') . $projet->token.'.' . $ext)) {
					unlink(public_path('files/cessions/actif/') . $projet->token .  '.' . $ext);
				}
				$name =  $projet->token .'.'. $ext;
				$pret->move(public_path('files/cessions/actif'), $name);
				Actif::updateOrCreate(['token'=>$projet->token],['contrat_cession_actif'=>$name]);
			}

		}
		return back();

	}


	public function open($token){
		$invest = Cession::updateOrCreate(['token'=>$token],['validated'=>1]);
		return back();
	}

	public function close($token){
		$invest = Cession::updateOrCreate(['token'=>$token],['validated'=>0]);
		return back();
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actif $actif)
    {
        //
	    dd($request);
    }

	public function save(Request $request){

		$token = $request->token;
		$actif = Actif::find($request->id);

		$actif->name = $request['name'];
		$actif->ville_id = $request['ville_id'];
		$actif->tactif_id = $request['tactif_id'];
		$actif->description = $request['description'];
		$actif->caracteristiques = $request['caracteristiques'];
		$actif->prix = $request['prix'];
		$actif->owner_id = Auth::user()->id;

		//$actif->token = $token;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/actifs')) {
					mkdir(public_path('img') . '/actifs');
				}

				if (file_exists(public_path('img') . '/' . $actif->imageUri )) {
					unlink(public_path('img') . '/' . $actif->imageUri);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/actifs'), $name);
				$actif->imageUri = 'actifs/' . $name;
			}

		}

		$actif->save();
		$request->session()->flash('success','L\'article a été correctement enregistré !!!');
		return redirect('/owner/actifs/'.$actif->token);
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
