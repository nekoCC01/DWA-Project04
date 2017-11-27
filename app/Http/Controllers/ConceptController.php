<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;

class ConceptController extends Controller {
	public function all() {
		
		$concepts = Concept::all();

		return view( 'concept.all' )->with( [
			'concepts' => $concepts
		] );
	}

	public function single( $concept_id ) {
		$selected_concept = Concept::find( $concept_id );

		return view( 'concept.single' )->with( [
			'selected_concept' => $selected_concept
		] );
	}
}
