<?php

use Illuminate\Database\Seeder;

class ArgumentConceptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $argument_concept_links = [
        	[1,1],
	        [2,2],
	        [3,3]
        ];

        foreach( $argument_concept_links as $argument_concept_link)
        {
	        DB::table('argument_concept')->insert([
	        	'argument_id' => $argument_concept_link[0],
		        'concept_id' => $argument_concept_link[1]
	        ]);
        }
    }
}
