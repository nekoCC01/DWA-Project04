<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
    public function concepts()
    {
    	return $this->belongsToMany('App\Concept');
    }
}
