<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tprojet extends Model
{
    //

    public function projets(){
        return $this->hasMany('App\Models\projet');
    }
}
