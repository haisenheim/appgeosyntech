<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Ville;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all()->where('role_id','=',10)->where('creator_id',Auth::user()->id);
	    //$pays = Pay::all();
       // dd($villes);
       // echo "Bonjour tout le monde!!";
        return view('Consultant/Clients/index')->with(compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        $user->pay_id = Auth::user()->pay_id;
	    $user->agence_id = Auth::user()->agence_id;
       // $user->password=bcrypt($request['password']);
       // $user->role_id =2;
	    $user->password= Hash::make(($request['password']));
	    $user->role_id =2;
	    $user->moi_id=date('m');
	    $user->annee=date('Y');
	    $user->male = $request['male']=='on'?1:0;
	    $user->active = 1;
	    $user->token = sha1(Auth::user()->id . date('Yhmdhis'));
	    $user->creator_id=Auth::user()->id;


        $user->save();
           $request->session('success','Le client a été correctement enregistré !!!');
            return redirect('/consultant/members');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        //
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
