<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $guarded = ['id'];

    public static function getProfileOwner(){
    	return 2;
    }

    public  function isAdminMaster(){
    	return $this->id == 1 ? true : false;
    }
}
