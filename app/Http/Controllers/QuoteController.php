<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Philosopher;

class QuoteController extends Controller {


	public function all() {

		$quotes       = Quote::all();
		$random_quote = $quotes->random();

		return view( 'quote.all' )->with( [
			'quotes'       => $quotes,
			'random_quote' => $random_quote
		] );

	}

	public function welcome() {
		$quotes       = Quote::all();
		$random_quote = $quotes->random();

		return view( 'welcome' )->with( [
			'random_quote' => $random_quote
		] );
	}

	public function single( $quote_id ) {

		$selected_quote = Quote::find( $quote_id );

		return view( 'quote.single' )->with( [
			'selected_quote' => $selected_quote
		] );
	}

}
