<?php

namespace App\Http\Controllers\Admin;

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


class AngelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::all()->where('role_id',4);
       // dd($villes);
       // echo "Bonjour tout le monde!!";
        return view('Admin/Angels/index')->with(compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$roles = Role::all();
        $pays = Pay::all();
        return view('admin/angels/create')->with(compact('pays'));
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
        $user->pay_id = Auth::user()->pay_id;
        $user->password=Hash::make($request['password']);
        $user->role_id =4;
        $user->moi_id=date('m');
        $user->annee=date('Y');
        $user->male = $request['male']=='on'?1:0;
       // $user->senior = $request['senior']=='on'?1:0;
        $user->active = 1;

        $user->save();
            session('message','L\'investisseur a été correctement enregistré !!!');
            return redirect('/admin/angels');


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
        $user = User::find($user)->first();
        return view('admin/angels/show')->with(compact('user'));
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
