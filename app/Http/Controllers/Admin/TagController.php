<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Models\Tinvestissement;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $pays = Tags::all();

	    return view('Admin/Tags/index')->with(compact('pays'))->with('success');
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
	    $ville = new Tags();
	    $ville->name = $request['name'];
	    $ville->save();
	    $request->session()->flash('success','Le mot clef a été correctement enregistré !!!');
	    return redirect('/admin/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tinvestissement  $tinvestissement
     * @return \Illuminate\Http\Response
     */
    public function show(Tinvestissement $tinvestissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tinvestissement  $tinvestissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Tinvestissement $tinvestissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tinvestissement  $tinvestissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tinvestissement $tinvestissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tinvestissement  $tinvestissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tinvestissement $tinvestissement)
    {
        //
    }
}
