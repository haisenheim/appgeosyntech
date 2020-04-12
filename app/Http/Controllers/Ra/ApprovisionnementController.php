<?php

namespace App\Http\Controllers\Ra;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Category;
use App\Models\Competence;
use App\Models\Devise;
use App\Models\Lappro;
use App\Models\Metier;
use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Unite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $entrees = Approvisionnement::all();
	    $articles = Article::all();
	    return view('Ra/Approvisionnements/index')->with(compact('entrees','articles'));
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
		//dd($request->imageUri);

		$ville =[];
		$ville['name']=str_pad(date('hiydm').Auth::user()->id,10,'0',STR_PAD_LEFT);
		$ville['token'] = sha1(date('Yhmdis').Auth::user()->id);
		$ville['user_id'] = Auth::user()->id;
		$lignes = $request->lignes;
		//$ville['minimum'] = $request->minimum;

		$ville = Approvisionnement::create($ville);
		for($i=0;$i<count($lignes);$i++){
			$l = new Lappro();
			$l->article_id = $lignes[$i]['article_id'];
			$l->quantity = $lignes[$i]['quantity'];
			$l->approvisionnement_id = $ville->id;
			$l->save();
			$art = Article::find($lignes[$i]['article_id']);
			$art->quantity = $art->quantity + $lignes[$i]['quantity'];
			$art->save();
		}

		return response()->json($ville);


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
		$entree = Approvisionnement::where('token',$token)->first();
		return view('Ra/Approvisionnements/show')->with(compact('entree'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
