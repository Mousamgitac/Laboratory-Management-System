<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class UserInfo extends Model
{
    protected $primaryKey = 'id';
    public function departments()
    {

   	return $this->belongsToMany('App\Department');

    }
     public function labModules()
    	{

   	return $this->belongsToMany('App\LabModule');

    }

    public function accessLevels()
    	{

   	return $this->belongsToMany('App\Access_level');

    }
}
