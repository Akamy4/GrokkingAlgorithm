<?php

namespace App\Console\Commands\Chapter8;

use Illuminate\Console\Command;

class GreedyAlgorithms extends Command
{
    protected $signature = 'app:greedy-algorithms';

    protected $description = 'Command description';

    public function handle()
    {
        $statesNeeded = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];

        $stations = [
            'kone'   => ['id', 'nv', 'ut'],
            'ktwo'   => ['wa', 'id', 'mt'],
            'kthree' => ['or', 'nv', 'ca'],
            'kfour'  => ['nv', 'ut'],
            'kfive'  => ['ca', 'az']
        ];

        $finalStations = [];

        while (!empty($statesNeeded)) {
            $bestStation   = null;
            $statesCovered = [];

            foreach ($stations as $station => $statesForStation) {
                $covered = array_intersect($statesNeeded, $statesForStation);
                if (count($covered) > count($statesCovered)) {
                    $bestStation   = $station;
                    $statesCovered = $covered;
                }
            }

            $statesNeeded                = array_diff($statesNeeded, $statesCovered);
            $finalStations[$bestStation] = true;
        }

        $finalStations = array_keys($finalStations);

        print_r($finalStations);

    }
}
