<?php

use Illuminate\Database\Seeder;
use App\Argument;

class ArgumentsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$arguments = [
			[
				'Pascals wager',
				'If we choose to believe and are right, we win eternal bliss. If we are wrong, we lose little. If we choose not to believe and are right we cannot win anything.',
				'Much to gain, little to lose - on should bet on Gods existence.'
			],
			[
				'Hume´s guillotine',
				'We can not derive an ´ought´- from an ´is´-statement.',
				'The world of value is separated from the world of fact.'
			],
			[
				'Plato´s cave',
				'We humans are like prisoners in a cave seeing only shadows on walls of figures that are put before an artificial light source.',
				'The visible world of our constantly changing everyday experience cannot be the world of truth which is perfect and unchanging.'
			],
			[
				'Cogito ergo sum',
				'While trying to think everything false, there is still this ´I´ who is thinking.',
				'I am thinking, therefore I exist.'
			]
		];


		$count = count( $arguments );

		foreach ( $arguments as $key => $argument ) {
			Argument::insert( [
				'created_at' => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'updated_at' => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'title'      => $argument[0],
				'assumption' => $argument[1],
				'conclusion' => $argument[2]
			] );
			$count --;
		}
	}
}
