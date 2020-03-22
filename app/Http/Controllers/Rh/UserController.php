<?php

namespace App\Http\Controllers\Rh;

use App\Http\Controllers\Controller;
use App\Models\Classement;
use App\Models\Competence;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
	    $users= \App\User::all()->where('role_id',8);
	    $pays = Pay::all();

        return view('Rh/Users/index')->with(compact('users','pays'));

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
        $user->password= Hash::make('sitrad');
        $user->role_id = 8;
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
          $request->session()->flash('success','L\'agent a été correctement enregistré !!!');
            return redirect('/rh/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $user = User::where('token',$token)->first();
	    //dd($user->competences);
	    $competences = Competence::all();
        return view('Rh/Users/show')->with(compact('user','competences'));
    }


	public function addCompetence(){
		$competence = DB::table('competences_users')->where(['competence_id'=>request('competence_id'),'user_id'=>request('user_id')])->first();
		//dd($competence);
		if(!$competence){
			DB::table('competences_users')->insert(['competence_id'=>request('competence_id'),'user_id'=>request('user_id')]);
			request()->session()->flash('success','Ok !!!');
		}else{
			request()->session()->flash('warning','Competence presente !!!');
		}

		return redirect()->back();
	}


	public function addCategory(){

		//dd($competence);

			$classe = Classement::all()->where('user_id',request('user_id'))->last();
			if($classe){
				$classe->fin = new Date();
				$classe->save();
			}

			DB::table('classements')->insert(['category_id'=>request('category_id'),'user_id'=>request('user_id'),'debut'=>request('debut')]);
			request()->session()->flash('success','Ok !!!');


		return redirect()->back();
	}

	public function deleteCompetence($user_id,$competence_id){
		DB::table('competences_users')->where(['competence_id'=>$competence_id,'user_id'=>$user_id])->delete();
		return redirect()->back();
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
