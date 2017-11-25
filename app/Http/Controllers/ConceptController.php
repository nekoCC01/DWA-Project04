<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;

class ConceptController extends Controller
{
	public function all()
	{
		/*
		$concept = Concept::find(1);
		dump($concept->arguments);
		*/


		$concepts = Concept::all();

		return view('concept.all')->with([
			'concepts' => $concepts
		]);
	}

	public function single($concept_id)
	{
		return view('concept.single')->with([
			'concept_id' => $concept_id
		]);
	}
}
