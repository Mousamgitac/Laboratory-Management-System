<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access_level extends Model
{
	
    protected $primaryKey = 'id';

    public function users()
    {

   	return $this->belongsToMany('App\user');

    }
}
