<?php

namespace App\Http\Controllers\Ro;

use App\Models\Certificat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificatController extends Controller
{
	//
	public function showCertif($token)
	{
		$cert = Certificat::where('token', $token)->first();
		return response()->file(public_path('files') . '/' . $cert->path);
		//$now = Carbon::now();
		//$week = $now->month;
	}

	public function addCertificat()
	{
		$comp = DB::table('certificats')->where(['tcertificat_id' => request('tcertificat_id'), 'user_id' => request('user_id')])->first();
		//dd($competence);
		if (!$comp) {
			$token = sha1(Auth::user()->id . date('ydmhis'));
			$data = ['tcertificat_id' => request('tcertificat_id'), 'user_id' => request('user_id'), 'debut' => request('debut'), 'fin' => request('fin')];
			$data['token'] = $token;
			$tc = Tcertificat::find(request('tcertificat_id'));
			$tname = $tc->name;
			if (request('fichier')) {
				$file = request('fichier');
				$ext = $file->getClientOriginalExtension();
				$arr_ext = array('jpg', 'png', 'jpeg', 'pdf');
				$path = public_path('files') . '/' . Str::slug($tname, '_');
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
					$data['path'] = Str::slug($tname, '_') . '/' . $name;
				} else {
					request()->session()->flash('danger', 'EXtension du fichier non valide !!!');
					return redirect()->back();
				}
			}
			Certificat::create($data);
			//DB::table('certificats')->insert($data);
			request()->session()->flash('success', 'Ok !!!');
		} else {
			request()->session()->flash('warning', 'Document déjà present !!!');
		}

		return redirect()->back();

	}
}