<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->call(QuotesTableSeeder::class);
	    $this->call(ConceptsTableSeeder::class);
	    $this->call(DefinitionsTableSeeder::class);
	    $this->call(ArgumentsTableSeeder::class);
	    $this->call(PhilosophersTableSeeder::class);
	    $this->call(WorksTableSeeder::class);
    }
}
