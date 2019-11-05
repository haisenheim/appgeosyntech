<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parametre;
use App\Models\Pay;
use Illuminate\Http\Request;

class ParametresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $parametre = Parametre::find(1);
	    // dd($villes);
	    // echo "Bonjour tout le monde!!";
	    // $request->session()->flash('message','Liste des villes!!!');
	    return view('Admin/Parametres/index')->with(compact('parametre'));
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
		if($request->pacte){
			$pacte = $request->pacte;
			$ext = $pacte->getClientOriginalExtension();
			$arr_ext = array('doc','docx','odt');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('files/docs'))) {
					mkdir(public_path('files/docs'));
				}

				if (file_exists(public_path('files/docs/pacte_associes') . '.' . $ext)) {
					unlink(public_path('files/docs/pacte_associes') .  '.' . $ext);
				}
				$name =  'pacte_associes.' . $ext;
				$pacte->move(public_path('files/docs'), $name);
				Parametre::updateOrCreate(['id'=>1],['pacte_associes'=>$name]);
			}

		}

		if($request->pret){
			$pacte = $request->pret;
			$ext = $pacte->getClientOriginalExtension();
			$arr_ext = array('doc','docx','odt');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('files/docs'))) {
					mkdir(public_path('files/docs'));
				}

				if (file_exists(public_path('files/docs/contrat_pret') . '.' . $ext)) {
					unlink(public_path('files/docs/contrat_pret') .  '.' . $ext);
				}
				$name =  'contrat_pret.' . $ext;
				$pacte->move(public_path('files/docs'), $name);
				Parametre::updateOrCreate(['id'=>1],['contrat_pret'=>$name]);
			}

		}

		if($request->actif){
			$pacte = $request->actif;
			$ext = $pacte->getClientOriginalExtension();
			$arr_ext = array('doc','docx','odt');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('files/docs'))) {
					mkdir(public_path('files/docs'));
				}

				if (file_exists(public_path('files/docs/contrat_cession_actifs') . '.' . $ext)) {
					unlink(public_path('files/docs/contrat_cession_actifs') .  '.' . $ext);
				}
				$name =  'contrat_cession_actif.' . $ext;
				$pacte->move(public_path('files/docs'), $name);
				Parametre::updateOrCreate(['id'=>1],['contrat_cession_actifs'=>$name]);
			}

		}


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
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
