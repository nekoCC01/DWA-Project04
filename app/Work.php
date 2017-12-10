<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }
}

