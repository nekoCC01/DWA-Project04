<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Philosopher;

class QuoteController extends Controller {


	public function all() {
		/*
		$quotes = Quote::where('category','Religion')->get();
		dump($quotes);


		$quote = Quote::find(1);
		echo $quote->philosopher->name;

		dump($quote->concepts);

		$quotes = Philosopher::find(8)->quotes;
		dump($quotes);

		*/

		$quotes = Quote::all();
		$random_quote = $quotes->random();

		return view( 'quote.all' )->with( [
			'quotes'       => $quotes,
			'random_quote' => $random_quote
		] );

	}

	public function welcome()
	{
		$quotes = Quote::all();
		$random_quote = $quotes->random();

		return view( 'welcome' )->with( [
			'random_quote' => $random_quote
		] );


	}


	public function single() {
		return view( 'quote.single' );
	}




}
