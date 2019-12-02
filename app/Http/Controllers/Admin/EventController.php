<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

		$events = Event::orderBy('created_at','desc')->paginate(10);
	    return view('/Admin/Events/index')->with(compact('events'));
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
	    $data = $request->except('_token');
	    $token = sha1(Auth::user()->id . date('Ydmshi'));
	    $data['token']=$token;
	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)){
			    $path = 'files/events';
			    if (!file_exists(public_path())) {
				    mkdir(public_path($path,777,true));
			    }
			    $path = $path.'/';
			    if (file_exists(public_path($path) . $token.'.' . $ext)) {
				    unlink(public_path($path) . $token .  '.' . $ext);
			    }
			    $name =  $token .'.'. $ext;
			    $file->move(public_path($path), $name);
			    $data['imageUri']=$path.$name;
		    }
	    }
	    $event = Event::updateOrCreate($request->except('_csrf'));

	    if($event){
		    return redirect('/admin/events');
	    }
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $event = Event::where('token',$token)->first();
	    //dd($projet);


	    return view('/Admin/Events/show')->with(compact('event'));
    }



	public function disable($id){
		$event = Event::where('token',$id);
		$event->active = 0;
		$event->save();

		return redirect()->back();
	}

	public function enable($id){
		$projet = Event::where('token',$id);
		$projet->active = 1;
		$projet->save();

		return redirect()->back();
	}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
