<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Tproduit;
use Illuminate\Http\Request;


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

	public function update(Request $request){

	}

	public function save(Request $request){
		$data = $request->except('_token');
		Produit::updateOrCreate(['id'=>$request->id], $data);
		$request->session()->flash('success','Produit enregistré !!!');
		return redirect('/admin/articles');
	}


	public function edit($id)
	{
		//
		$article = Produit::find($id);
		$categories = Category::all();
		$types = Tproduit::all();
		$fournisseurs = Fournisseur::all();
		//dd($article);
		return view('Admin/Articles/edit')->with(compact('article','categories','types','fournisseurs'));
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
