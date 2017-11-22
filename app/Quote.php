<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	public function philosopher()
	{
		return $this->belongsTo('App\Philosopher');
	}
}
