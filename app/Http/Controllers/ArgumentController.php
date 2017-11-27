<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;

class ArgumentController extends Controller {
	public function all() {

		$arguments = Argument::all();

		return view( 'argument.all' )->with( [
			'arguments' => $arguments
		] );
	}

	public function single( $argument_id ) {
		$selected_argument = Argument::find( $argument_id );

		return view( 'argument.single' )->with( [
			'selected_argument' => $selected_argument
		] );
	}

}
