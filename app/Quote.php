<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function philosopher()
    {
        return $this->belongsTo('App\Philosopher');
    }

    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    public function concepts()
    {
        return $this->belongsToMany('App\Concept');
    }

    public function arguments()
    {
        return $this->belongsToMany('App\Argument');
    }
}
