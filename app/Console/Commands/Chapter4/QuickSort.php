<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;
use Carbon\Carbon;

class QuickSort extends Command
{
    protected $signature = 'app:quick-sort';

    protected $description = 'Глава 4. Разделяй и влавстуй';

    public function handle()
    {
        $randomNumbers = [];

        for ($i = 0; $i < 100000; $i++) {
            $randomNumbers[] = random_int(0, 1000);
        }

//        $this->info("Arr " . print_r($randomNumbers, true));

        $startTime = Carbon::now();

        $result = $this->quickSort($randomNumbers);

        $endTime = Carbon::now();

        $executionTime = $startTime->diffInMilliseconds($endTime);

//        $this->info("Result: " . print_r($result, true));
        $this->info("Execution time: {$executionTime} milliseconds");
    }

    private function quickSort(array $arr): array
    {
        $count   = count($arr);
        $less    = [];
        $greater = [];

        if ($count < 2) {
            return $arr;
        }

        $pivot = $arr[(int)($count / 2)];

        foreach ($arr as $item) {
            if ($item < $pivot) {
                $less[] = $item;
            }

            if ($item > $pivot) {
                $greater[] = $item;
            }
        }

        return array_merge($this->quickSort($less), [$pivot], $this->quickSort($greater));
    }
}
