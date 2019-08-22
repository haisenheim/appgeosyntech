<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tprojet;
use Illuminate\Http\Request;

class TprojetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tprojets = Tprojet::all();
         return view('admin/tprojets/index')->with(compact('tprojets'));
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
        $tprojet = new Tprojet();
        $tprojet->name = $request['name'];
        //$ville->pay_id = $request['pay_id'];
        //$ville->save();
        $request->session()->flash('success','Le type de projet a été correctement enregistré !!!');
        return redirect('/admin/tprojets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tprojet  $tprojet
     * @return \Illuminate\Http\Response
     */
    public function show(Tprojet $tprojet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tprojet  $tprojet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tprojet $tprojet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tprojet  $tprojet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tprojet $tprojet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tprojet  $tprojet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tprojet $tprojet)
    {
        //
    }
}
