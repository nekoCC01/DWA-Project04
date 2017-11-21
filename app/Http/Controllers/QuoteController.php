<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{


	public function all()
	{
		return view('quote.all');
	}

	public function single()
	{
		return view('quote.single');
	}


}
