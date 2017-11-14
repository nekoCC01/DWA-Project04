<?php

use Illuminate\Database\Seeder;
use App\Quote;

class QuotesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$quotes = [
			[
				'He who begins by loving Christianity better than Truth will proceed by loving his own sect or church better than Christianity, and end by loving himself better than all.',
				'English',
				'Religion'
			]
		];


		$count = count( $quotes );

		foreach ( $quotes as $key => $quote ) {
			Quote::insert( [
				'created_at' => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'updated_at' => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'quote'      => $quote[0],
				'language'   => $quote[1],
				'category'   => $quote[2]
			] );
			$count --;
		}


	}
}
