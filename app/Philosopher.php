<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Philosopher extends Model
{
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }

    public function arguments()
    {
        return $this->hasMany('App\Argument');
    }
}
