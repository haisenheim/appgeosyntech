<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    //
    protected $guarded = [];
	public $timestamps = false;

    public function pay(){
        return $this->belongsTo('App\Models\Pay');
    }
}
