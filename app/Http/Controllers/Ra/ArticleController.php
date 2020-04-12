<?php

namespace App\Http\Controllers\Ra;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Article;
use App\Models\Category;
use App\Models\Competence;
use App\Models\Devise;
use App\Models\Metier;
use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Tarticle;
use App\Models\Unite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $articles = Article::all();
	    $tarticles = Tarticle::all();
	    $unites = Unite::all();
	    return view('Ra/Articles/index')->with(compact('unites','articles','tarticles'));
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
		$ville['name']=$request->name;
		$ville['minimum'] = $request->minimum;
		$ville['tarticle_id']=$request->tarticle_id;
		$ville['unite_id'] = $request->unite_id;
		$ville['quantity'] = $request->quantity;
		$ville['token'] = sha1(date(Auth::user()->id . date('Yhmisd')));

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/articles')) {
					mkdir(public_path('img') . '/articles');
				}
				$token = sha1(Auth::user()->id. date('ydmhis'));
				if (file_exists(public_path('img') . '/articles/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/articles/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/articles'), $name);
				$ville['imageUri'] = 'articles/' . $name;
			}
		}

		$ville = Article::create($ville);

		$request->session()->flash('success','L\'unité a été correctement enregistrée !!!');
		return back();


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
		$article = Article::where('token',$token)->first();
		return view('Ra/Articles/show')->with(compact('article'));
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
