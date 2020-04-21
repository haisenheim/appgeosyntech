<?php

namespace App\Http\Controllers\Rh;

use App\Models\Contrat;
use App\Models\Tcontrat;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
	//

	public function index(){
		//$users = User::all()->where('role_id',8);
		$types = Tcontrat::all();
		$contrats = Contrat::all()->sortByDesc('created_at');
		 return view('Rh/Contrats/index')->with(compact('contrats','types'));
	}

	public function show($token)
	{
		$cert = Contrat::where('token', $token)->first();
		return response()->file(public_path('files') . '/' . $cert->path);
		//$now = Carbon::now();
		//$week = $now->month;
	}

	public function renew()
	{
		$comp = Contrat::where('token', request('token'))->first();
		//dd($competence);
		if ($comp) {
			$token = sha1(Auth::user()->id . date('ydmhis'));

			$data = ['tcontrat_id' => request('tcontrat_id'), 'user_id' => $comp->user_id, 'debut' => request('debut'), 'fin' => request('fin')];
			$data['token'] = $token;
			$data['parent'] = $comp->id;
			//$data['partenaire_id']= request('partenaire_id');
			//$tc = $comp->tcertificat;
			$tname = 'contrats';
			if (request('fichier')) {
				$file = request('fichier');
				$ext = $file->getClientOriginalExtension();
				$arr_ext = array('jpg', 'png', 'jpeg', 'pdf');
				$path = public_path('files/contrats');
				if (in_array($ext, $arr_ext)) {
					if (!file_exists($path)) {
						//umask(777);
						if (!file_exists(public_path('files'))) {
							mkdir(public_path('files'));
						}
						mkdir($path);
					}
					if (file_exists($path . '/' . $token . '.' . $ext)) {
						unlink($path . '/' . $token . '.' . $ext);
					}
					$name = $token . '.' . $ext;
					$file->move($path, $name);
					$data['path'] =   'contrats/' . $name;
				} else {
					request()->session()->flash('danger', 'EXtension du fichier non valide !!!');
					return redirect()->back();
				}
			}
			Contrat::create($data);
			$comp->active =0;
			$comp->save();
			//DB::table('certificats')->insert($data);
			request()->session()->flash('success', 'Ok !!!');
		} else {
			request()->session()->flash('warning', 'Contrat precedent introuvable !!!');
		}

		return redirect()->back();

	}
}