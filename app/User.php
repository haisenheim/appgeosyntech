<?php

namespace App;

use App\Traits\LockableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	use LockableTrait;

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

	public function centre(){
		return $this->belongsTo('App\Models\Centre');
	}

	public function formations(){
		return $this->belongsToMany('App\Models\Formation','comptes_formations','compte_id');
	}




    public function getNameAttribute(){
        return $this->last_name . "  ".$this->first_name;
    }

	public function creator(){
		return $this->belongsTo('App\User','creator_id');
	}

	public function ville(){
		return $this->belongsTo('App\User','ville_id');
	}

	public function getRangAttribute(){
		$rang = '';
		if($this->role_id==6){
			$rang= 'junior';

			if($this->confirmed){
				$rang= 'confirmé';
			}

			if($this->senior){
				$rang= 'senior';
			}

		}

		return $rang;
	}

}
