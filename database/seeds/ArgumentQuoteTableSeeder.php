<?php

use Illuminate\Database\Seeder;

class ArgumentQuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $argument_quote_links = [
            [1, 1],
            [2, 3],
            [3, 4],
            [4, 2]
        ];

        foreach ($argument_quote_links as $argument_quote_link) {
            DB::table('argument_quote')->insert([
                'argument_id' => $argument_quote_link[0],
                'quote_id'    => $argument_quote_link[1]
            ]);
        }
    }
}
