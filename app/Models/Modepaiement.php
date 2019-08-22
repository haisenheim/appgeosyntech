<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modepaiement extends Model
{
    public function projets(){
        return $this->hasMany('App\Models\Projet','owner_id');
    }


    //
}
