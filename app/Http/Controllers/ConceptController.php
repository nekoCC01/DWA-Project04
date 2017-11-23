<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;

class ConceptController extends Controller
{
	public function all()
	{
		$concept = Concept::find(1);

		dump($concept->arguments);

		return view('concept.all');
	}

	public function single()
	{
		view('concept.single');
	}
}
