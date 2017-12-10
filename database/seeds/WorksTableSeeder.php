<?php

use Illuminate\Database\Seeder;
use App\Work;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            [
                'Pensées',
                'Q17360856',
                9
            ],
            [
                'A Treatise of Human Nature',
                'Q2451675',
                5
            ],
            [
                'The Republic',
                'Q123397',
                8
            ],
            [
                'Meditations',
                null,
                9
            ],
            [
                'Institutes',
                'Q371558',
                10
            ]
        ];

        $count = count($works);

        foreach ($works as $key => $work) {
            Work::insert([
                'created_at'     => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at'     => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title'          => $work[0],
                'wikidata_id'    => $work[1],
                'philosopher_id' => $work[2]
            ]);
            $count--;
        }
    }
}
