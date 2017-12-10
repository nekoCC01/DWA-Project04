<?php

use Illuminate\Database\Seeder;
use App\Philosopher;

class PhilosophersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $philosophers = [
            [
                'Blaise Pascal',
                'Q1290'
            ],
            [
                'Augustinus',
                'Q8018'
            ],
            [
                'Richard Swinburne',
                'Q712709'
            ],
            [
                'Karl Popper',
                'Q81244'
            ],
            [
                'David Hume',
                'Q37160'
            ],
            [
                'Linda Elder',
                'Q20011916'
            ],
            [
                'Larry Churchill',
                ''
            ],
            [
                'Plato',
                'Q859'
            ],
            [
                'René Descartes',
                'Q9191'
            ],
            [
                'John Calvin',
                'Q37577'
            ],
            [
                'Linda Elder',
                'Q20011916'
            ]
        ];

        $count = count($philosophers);

        foreach ($philosophers as $key => $philosopher) {
            Philosopher::insert([
                'created_at'  => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at'  => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name'        => $philosopher[0],
                'wikidata_id' => $philosopher[1]
            ]);
            $count--;
        }
    }
}
