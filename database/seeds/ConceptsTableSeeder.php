<?php

use Illuminate\Database\Seeder;
use App\Concept;

class ConceptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $concepts = [
		    [
			    'Faith'
		    ],
		    [
		    	'Ethics'
		    ],
		    [
		    	'The Good'
		    ]
	    ];

	    $count = count( $concepts );

	    foreach ( $concepts as $key => $concept ) {
		    Concept::insert( [
			    'created_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
			    'updated_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
			    'concept'       => $concept[0]
		    ] );
		    $count --;
	    }
    }
}
