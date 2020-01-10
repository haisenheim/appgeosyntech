<?php

namespace App\Http\Controllers\National;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Organisme;
use App\Models\Pay;
use App\Models\Torganisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $entreprises = Entreprise::all()->where('pay_id',Auth::user()->pay_id);
	    //$pays = Pay::all();
	    return view('National/Entreprises/index')->with(compact('entreprises'));
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

	public function disable($token){
		$entreprise = Entreprise::updateOrCreate(['token'=>$token],['active'=>0]);
		$entreprise->users()->update(['active'=>0]);
		//User::updateOrCreate(['entreprise_id'=>$entreprise->id],['active'=>0]);

		return back();
	}

	public function enable($token){
		$entreprise = Entreprise::updateOrCreate(['token'=>$token],['active'=>1]);
		$entreprise->users()->update(['active'=>1]);
		//User::updateOrCreate(['entreprise_id'=>$entreprise->id],['active'=>1]);

		return back();
	}




	public function store(Request $request)
	{

		$data = [
			'name'=>$request['name'],
			'address'=>$request['address'],
			'phone'=>$request['phone'],

			'pay_id'=>$request['pay_id'],
			'description'=>$request['description'],
			'email'=>$request['email'],
			'token'=>sha1(Auth::user()->id. date('Ymdhis'))
		];

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/entreprises')) {
					mkdir(public_path('img') . '/entreprises');
				}
				$token = sha1(date('ydmhis'));
				if (file_exists(public_path('img') . '/entreprises/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/entreprises/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/entreprises'), $name);
				$data['imageUri'] = 'entreprises/' . $name;
			}

		}

		$entreprise = Entreprise::create($data);
		if($entreprise){
			Validator::make($data, [
				'email' => [
					'required',
					Rule::unique('users')
				],
			]);
			$user_data = array(
				'last_name' => $request->last_name,
				'first_name' => $request->first_name,
				'role_id' => 5,
				'email' => $request->user_email,
				'password' => Hash::make($request->password),
				'male' => $request->gender,
				'address' => $request->user_address,
				'phone' => $request->user_phone,
				'remember_token' => sha1(Auth::user()->id. date('Ymdhis')),
				'entreprise_id' => $entreprise->id,
				'pay_id'=>$entreprise->pay_id,
				'creator_id'=>Auth::user()->id,
				'token'=> sha1(Auth::user()->id . date('YmHisd'))


			);

			if($request->user_imageUri){
				$file = $request->user_imageUri;
				$ext = $file->getClientOriginalExtension();
				$arr_ext = array('jpg','png','jpeg','gif');
				if(in_array($ext,$arr_ext)) {
					if (!file_exists(public_path('img') . '/users')) {
						mkdir(public_path('img') . '/users');
					}
					$token = sha1(date('ydmhis'));
					if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
						unlink(public_path('img') . '/users/' . $token . '.' . $ext);
					}
					$name = $token . '.' . $ext;
					$file->move(public_path('img/users'), $name);
					$user_data['imageUri'] = 'users/' . $name;
				}
			}

			User::create($user_data);
		}
		$request->session()->flash('success','L\'entreprise  a été correctement enregistré !!!');
		return back();
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
		$entreprise = Entreprise::where('token',$token)->first();
		return view('National/Entreprises/show')->with(compact('entreprise'));
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
