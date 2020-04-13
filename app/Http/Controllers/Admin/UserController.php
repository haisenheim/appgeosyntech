<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $users= \App\User::all();
		$roles = Role::all()->where('id','<',6);
        return view('Admin/Users/index')->with(compact('users','roles'));

    }


	public function getAgents()
	{
		//
		$users= \App\User::all()->where('role_id',8);
		$pays = Pay::all();

		return view('Admin/Users/agents')->with(compact('users','pays'));

	}


	public function getAgent($token)
	{
		//
		$user = User::where('token',$token)->first();

		return view('Admin/Users/agent')->with(compact('user'));
	}



	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $pays = Pay::all();
        return view('Admin/Users/create')->with(compact('roles','pays'));
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
      //  dd($request['imageUri']);
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->email = $request['email'];
        $user->pay_id = $request->pay_id;
       // $user->role_id = $request['role_id'];
        $user->password= Hash::make(($request['password']));
        $user->role_id = $request->role_id;
        $user->moi_id=date('m');
        $user->annee=date('Y');
       // $user->male = $request['male']=='on'?1:0;
        $user->active = 1;
	    $user->token = sha1(Auth::user()->id . date('Yhmdhis'));

	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/users')) {
				    mkdir(public_path('img') . '/users');
			    }
			    $token = sha1(Auth::user()->id. date('ydmhis'));
			    if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/users/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/users'), $name);
			    $user->imageUri = 'users/' . $name;
		    }
	    }


        $user->save();
          $request->session()->flash('message','L\'utilisateur a été correctement enregistrée !!!');
            return redirect('/admin/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        //$user = User::find($user)->first();
        return view('Admin/Users/show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
