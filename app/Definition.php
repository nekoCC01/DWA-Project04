<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model {
	public function philosopher() {
		return $this->belongsTo( 'App\Philosopher' );
	}

	public function work() {
		return $this->belongsTo( 'App\Work' );
	}
}
