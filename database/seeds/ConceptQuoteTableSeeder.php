<?php

use Illuminate\Database\Seeder;

class ConceptQuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $concept_quote_links = [
		    [1,1],
		    [2,3],
		    [3,3],
		    [1,2],
		    [3,4]
	    ];

	    foreach( $concept_quote_links as $concept_quote_link)
	    {
		    DB::table('concept_quote')->insert([
			    'concept_id' => $concept_quote_link[0],
			    'quote_id' => $concept_quote_link[1]
		    ]);
	    }
    }
}
