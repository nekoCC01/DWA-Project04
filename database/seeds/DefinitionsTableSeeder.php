<?php

use Illuminate\Database\Seeder;
use App\Definition;

class DefinitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $definitions = [
		    [
			    'a firm and certain knowledge of God’s benevolence towards us, founded upon the truth of the freely given promise in Christ, both revealed to our minds and sealed upon our hearts through the Holy Spirit'
		    ],
		    [
		    	'the person of religious faith is the person who has the theoretical conviction that there is a God'
		    ],
		    [
		    	'a set of concepts and principles that guide us in determining what behavior helps or harms sentient creatures'
		    ],
		    [
		    	'Ethics, understood as the capacity to think critically about moral values and direct our actions in terms of such values, is a generic human capacity'
		    ],
		    [
		    	'the one form of sameness and difference that was relevant to the particular ways of life themselves'
		    ],
		    [
		    	'cause of knowledge and truth, it is also an object of knowledge'
		    ]
	    ];

	    $count = count( $definitions );

	    foreach ( $definitions as $key => $definition ) {
		    Definition::insert( [
			    'created_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
			    'updated_at'  => Carbon\Carbon::now()->subDays( $count )->toDateTimeString(),
			    'definition'       => $definition[0]
		    ] );
		    $count --;
	    }
    }
}
