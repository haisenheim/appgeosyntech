<?php

namespace App;

use App\Models\Classement;
use App\Models\Livraison;
use App\Traits\LockableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;

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

	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function certificats(){
		return $this->hasMany('App\Models\Certificat');
	}

	public function livraisons(){
		return $this->hasMany('App\Models\Livraison');
	}

	public function classements(){
		return $this->hasMany('App\Models\Classement');
	}
	public function competences(){
		return $this->belongsToMany('App\Models\Competence','competences_users');
	}

	public function bulletins(){
		return $this->hasMany('App\Models\Bulletin');
	}

	public function getClasseAttribute(){
		$classement = Classement::all()->where('user_id',$this->id)->last();

		return $classement;

	}

	public function getFreeAttribute(){
		//$user = User::find($this->id);

		$livraisons = Livraison::all()->where('user_id',$this->id)->where('fin','>',Carbon::today());

		return (!$livraisons->count()==0);
	}

    public function getNameAttribute(){
        return $this->last_name . "  ".$this->first_name;
    }


}
