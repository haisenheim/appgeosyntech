<?php

namespace App\Http\Controllers;


use App\Models\Bulletin;
use App\Models\Facture;
use App\Models\Fiche;
use App\Models\Livraison;
use App\Models\Pay;
use App\Models\Pointage;

use App\Models\Ville;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use PDF;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function test()
	{
		$user = User::where('token',request('token'))->first();

		if ($user) {
			//dd($user);
			$fiche = Fiche::create(['name'=>str_pad(date('ydm').$user->client_id,10,'0',STR_PAD_LEFT),'jour'=>new \DateTime(), 'user_id'=>$user->id, 'client_id'=>$user->client_id,
				'token'=>sha1($user->id . date('Ymdhis')), 'moi_id'=>date('m'),'annee'=>date('Y')
			]);

			// dd($fiche);

			$facture = Facture::where('client_id',$user->client_id)->where('moi_id',date('m'))->where('annee',date('Y'))->first();
			if(!$facture){
				$facture = Facture::create(['name'=>str_pad(date('ydm').$user->client_id,10,'0',STR_PAD_LEFT),'moi_id'=>date('m'),'annee'=>date('Y'),
					'token'=>sha1($user->id . date('Ymdhis')), 'client_id'=>$user->client_id
				]);
			}
			//dd($facture);
			if($fiche){
				$livraisons = Livraison::all()->where('client_id',$user->client_id)->where('fin','>',Carbon::today());
				//dd($livraisons);
				foreach($livraisons as $livraison){
					$bulletin = Bulletin::where('user_id',$livraison->user_id)->where('moi_id',date('m'))->where('annee',date('Y'))->first();
					if(!$bulletin){
						$bulletin = Bulletin::create(['user_id'=>$livraison->user_id,'moi_id'=>date('m'),'annee'=>date('Y'),
							'token'=>sha1($user->id.date('ymdsih').$livraison->user_id),
							'name'=>str_pad(date('ydm').$livraison->user_id,10,'0',STR_PAD_LEFT),
							'livraison_id'=>$livraison->id
						]);
					}
					//dd($bulletin);
					$point =Pointage::create([
						'bulletin_id'=>$bulletin->id, 'livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id,
						'fiche_id'=>$fiche->id,'moi_id'=>date('m'),'facture_id'=>$facture->id,
						'annee'=>date('Y'),'token'=>sha1($fiche->id . $livraison->user_id . $livraison->id. date('Ymdhsi'))
					]);

				}
			}

			dd($fiche);

			return view('Utils/test')->with(compact('fiche','facture','bulletin'));
		}else {
			return response()->json([
				'success' => false,
				'message' => 'Impossible de creer la fiche'
			]);
		}



	}


    public function index(Request $request)
    {
        //
        $villes = Ville::all();
	    $pays = Pay::all();
       // dd($villes);
       // echo "Bonjour tout le monde!!";
       // $request->session()->flash('message','Liste des villes!!!');
        return view('Admin/Villes/index')->with(compact('villes','pays'))->with('success','Liste des villes');

    }


	public function makePdf()
	{
		$data = [
			'title' => 'Mon document en Pdf',
			'heading' => 'OBAC ALERT - By Alliages Technologies',
			'content' => 'Le contenu du document'
		];


		$pdf = PDF::loadView('pdf_view',$data);
		return $pdf->download('medium.pdf');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pays = Pay::all();
        return view('Admin/Villes/create')->with(compact('pays'));
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
        $ville = new Ville();
        $ville->name = $request['name'];
        $ville->pay_id = $request['pay_id'];
	    $ville->longitude = $request['longitude'];
	    $ville->latitude = $request['latitude'];
	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/villes')) {
				    mkdir(public_path('img') . '/villes');
			    }
			    $token = sha1(date('ydmhis'));
			    if (file_exists(public_path('img') . '/villes/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/villes/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/villes'), $name);
			    $ville->imageUri = 'villes/' . $name;
		    }

	    }

        $ville->save();
            $request->session()->flash('success','La ville a été correctement enregistrée !!!');
            return redirect('/admin/villes');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show($ville)
    {
        //
	    //dd($ville);
        $ville = Ville::find($ville);
	    $projets = Projet::all()->where('active',1)->where('ville_id',$ville->id);
        return view('Front/Villes/show')->with(compact('ville','projets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        //
    }
}
