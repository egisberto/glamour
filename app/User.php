<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','company_id','profile_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public  function isAdminMaster(){

        return $this->profile_id == 1 ? true : false;
    }

    public static function all($columns = ['*']) {
        $user = Auth::user();

        if ($user->isAdminMaster() ){
            return parent::all();            
        }

        return parent::where('company_id', $user->company_id);
    }
}
