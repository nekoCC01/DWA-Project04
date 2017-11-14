<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->call( [
			QuotesTableSeeder::class,
			ConceptsTableSeeder::class,
			DefinitionsTableSeeder::class,
			ArgumentsTableSeeder::class,
			PhilosophersTableSeeder::class,
			WorksTableSeeder::class
		] );
	}
}
