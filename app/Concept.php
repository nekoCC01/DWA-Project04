<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{

    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }

    public function arguments()
    {
        return $this->belongsToMany('App\Argument');
    }

    public function quotes()
    {
        return $this->belongsToMany('App\Quote');
    }

}
