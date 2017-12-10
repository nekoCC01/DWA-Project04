<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{

    public function concept()
    {
        return $this->belongsTo('App\Concept');
    }

    public function philosopher()
    {
        return $this->belongsTo('App\Philosopher');
    }

    public function work()
    {
        return $this->belongsTo('App\Work');
    }
}
