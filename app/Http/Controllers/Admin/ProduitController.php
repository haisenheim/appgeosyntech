<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Produit;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $articles = Produit::all()->groupBy(function($q){
		    return $q->tproduit?$q->tproduit->name:null;
	    });
	    //dd($articles);

	    return view('Admin/Articles/index')->with(compact('articles'));
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
		$article = Article::where('token',$token)->first();
		return view('Admin/Articles/show')->with(compact('article'));
	}


}
