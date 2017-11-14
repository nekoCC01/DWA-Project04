<?php

use Illuminate\Database\Seeder;
use App\Work;

class WorksTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$works = [
			[
				'Pensées',
				'Q17360856'
			],
			[
				'A Treatise of Human Nature',
				'Q2451675'
			],
			[
				'The Republic',
				'Q123397'
			],
			[
				'Meditations',
				''
			]
		];

		$count = count( $works );

		foreach ( $works as $key => $work ) {
			Work::insert( [
				'created_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'updated_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
				'title'       => $work[0],
				'wikidata_id' => $work[1]
			] );
			$count --;
		}
	}
}
