<?php

namespace App\Http\Controllers\Angel;

use App\Models\AngelTag;
use App\Http\Controllers\Controller;
use App\Models\Investissement;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $tags = Tags::all();
	    $mytags = AngelTag::all()->where('user_id',Auth::user()->id);
	    return view('/Angel/Tags/index')->with(compact('tags','mytags'));
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
	    $tag = new AngelTag();
	    $tag->tag_id = $request->tag_id;
	    $tag->user_id = Auth::user()->id;
	    $tag->save();
	    $request->session()->flash('success','Le mot clef a été correctement enregistré !!!');
	    return redirect('/angel/tags');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function show(Investissement $investissement)
    {
        //
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
