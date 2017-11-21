<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConceptController extends Controller
{
	public function all()
	{
		return view('concept.all');
	}

	public function single()
	{
		view('concept.single');
	}
}
