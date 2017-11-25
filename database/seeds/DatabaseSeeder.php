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
			PhilosophersTableSeeder::class,
			QuotesTableSeeder::class,
			ConceptsTableSeeder::class,
			DefinitionsTableSeeder::class,
			ArgumentsTableSeeder::class,
			WorksTableSeeder::class,
			ArgumentConceptTableSeeder::class
		] );
	}
}
