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
    protected $guarded = [

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

	public function actifs(){
		return $this->hasMany('App\Models\Actif','owner_id');
	}

	public function investissements(){
		return $this->hasMany('App\Models\Investissement','angel_id');
	}

	public function cessions(){
		return $this->hasMany('App\Models\Cession','angel_id');
	}

    // Association avec les roles

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

	public function pays(){
		return $this->belongsTo('App\Models\Pay','pay_id');
	}

	public function entreprise(){
		return $this->belongsTo('App\Models\Entreprise');
	}

	public function organisme(){
		return $this->belongsTo('App\Models\Organisme');
	}

	public function tags(){
		return $this->belongsToMany('App\Models\Tags', 'angels_tags', 'user_id','tag_id');
	}

    public function getNameAttribute(){
        return $this->last_name . "  ".$this->first_name;
    }

	public function creator(){
		return $this->belongsTo('App\User','creator_id');
	}

	public function qualite(){
		if($this->role_id==2){
			if($this->senior){
				return 'senior';
			}
			if($this->confirmed){
				return 'confirmé';
			}

			return 'junior';

		}

		return '';
	}

}
