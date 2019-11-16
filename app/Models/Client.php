<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $table = 'users';
    public function projets(){
        return $this->hasMany('App\Models\Projet','owner_id');
    }


    //
}
