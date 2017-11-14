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
				'Let us weigh the gain and the loss in wagering that God is. Let us estimate these two chances. If you gain, you gain all; if you lose, you lose nothing. Wager, then, without hesitation that He is.',
				'English',
				'Religion'
			],
			[
				'I believe, therefore I understand.',
				'English',
				'Religion'
			],
			[
				'Perhaps the simplest and most important point about ethics is purely logical. I mean the impossibility to derive non-tautological ethical rules … from statements of facts.',
				'English',
				'Ethics'
			],
			[
				'Behold! human beings living in an underground den... Like ourselves... they see only their own shadows, ro the shadows of one antoher, which the fire throws on the opposite wall of the cave.',
				'English',
				'Knowledge'
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
