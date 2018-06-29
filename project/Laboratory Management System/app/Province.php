<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public function registrations(){
    	return $this->hasMany('App\Registration');
    }
}
