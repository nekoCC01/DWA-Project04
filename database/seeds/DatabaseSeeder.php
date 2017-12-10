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
        $this->call([
            PhilosophersTableSeeder::class,
            WorksTableSeeder::class,
            QuotesTableSeeder::class,
            ConceptsTableSeeder::class,
            DefinitionsTableSeeder::class,
            ArgumentsTableSeeder::class,
            ArgumentConceptTableSeeder::class,
            ArgumentQuoteTableSeeder::class,
            ConceptQuoteTableSeeder::class
        ]);
    }
}
