<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'phone' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Association avec les projets

    public function projets(){
        return $this->hasMany('App\Models\Projet','owner_id');
    }

    // Association avec les roles

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

	public function pays(){
		return $this->belongsTo('App\Models\Pay','pay_id');
	}

	public function tags(){
		return $this->belongsToMany('App\Models\Tags', 'angels_tags', 'user_id','tag_id');
	}

    public function getNameAttribute(){
        return $this->last_name . "  ".$this->first_name;
    }

}
