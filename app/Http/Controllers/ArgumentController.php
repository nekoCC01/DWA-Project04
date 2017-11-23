<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;

class ArgumentController extends Controller
{
	public function all()
	{
		$argument = Argument::find(3);
		dump($argument->concepts);

		return view('argument.all');
	}

	public function single()
	{
		return view('argument.all');
	}

}
