<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   protected $primaryKey = 'id';
   
   public function users()
    {

   	return $this->belongsToMany('App\user');

    }
}
