<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Disposition;


class SortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $sorties = Disposition::all();
	    $articles = Article::all();
	    $clients = Client::all();
	    return view('Admin/Sorties/index')->with(compact('sorties','articles','clients'));
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
		$sortie = Disposition::where('token',$token)->first();
		return view('Admin/Sorties/show')->with(compact('sortie'));
	}
}
