<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tinvestissement;
use Illuminate\Http\Request;

class TinvestissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $pays = Tinvestissement::all();

	    return view('Admin/Tinvestissements/index')->with(compact('pays'))->with('success');
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
	    $ville = new Tinvestissement();
	    $ville->name = $request['name'];
	    $ville->save();
	    $request->session()->flash('success','Le type d\'investissement a été correctement enregistré !!!');
	    return redirect('/admin/tinvestissements');
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
