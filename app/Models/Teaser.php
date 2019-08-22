<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teaser extends Model
{
    //
	protected $guarded = [];
    public function projet(){
        return $this->belongsTo('App\Models\Projet');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
