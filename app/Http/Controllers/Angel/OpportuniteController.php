<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Projet;
use App\Models\TagsProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpportuniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

	    $tag_ids = [];
	    foreach(Auth::user()->tags as $tags){
		    $tag_ids[] = $tags->id;
	    }

	   // dd($tag_ids);

	    //$tps = DB::table('tags_projets')->whereIn('tag_id',[2,3])->value('projet_id');
	    //dd($tps);

	    $projets = TagsProjet::whereIn('tag_id',$tag_ids)->paginate(8);
	    //dd($prj_tags);

	   // dd($prj_tags);
	    $projets = Projet::orderBy('created_at','desc')->where('etape',4)->where('validated_step',4)->paginate(4);
	    $actifs = Actif::orderBy('created_at','desc')->paginate(4);

        return view('/Angel/Opportunites/index')->with(compact('projets','actifs'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($p)
    {
        //

	   // dd($p);
	    $projet = Projet::all()->where('token',$p)->first();
	    return view('/Angel/Dossiers/show')->with(compact('projet'));
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
