<?php

namespace App\Console\Commands\Chapter2;

use Carbon\Carbon;
use Illuminate\Console\Command;

class SelectionSort extends Command
{
    protected $signature = 'app:selection-sort';

    protected $description = 'Сортировка выбором';

    public function handle()
    {
        $randomNumbers = [];

        for ($i = 0; $i < 100000; $i++) {
            $randomNumbers[] = random_int(0, 1000);
        }

//        $this->info("Unsorted array: " . print_r($randomNumbers, true));

        $startTime = Carbon::now();

        $sortedArr = $this->selectionSort($randomNumbers);

        $endTime = Carbon::now();

//        $this->info("Sorted array: " . print_r($sortedArr, true));

        $executionTime = $startTime->diffInMilliseconds($endTime);
        $this->info("Execution time: {$executionTime} milliseconds");

    }

    private function selectionSort(array $arr): array
    {
        $sortedArr = [];

        while (!empty($arr)) {
            $smallest    = $this->smallestIndex($arr);
            $sortedArr[] = array_splice($arr, $smallest, 1)[0];
        }

        return $sortedArr;
    }

    private function smallestIndex(array $arr): int
    {
        $smallest      = $arr[0];
        $smallestIndex = 0;

        foreach ($arr as $i => $iValue) {
            if ($iValue < $smallest) {
                $smallestIndex = $i;
            }
        }

        return $smallestIndex;
    }
}
