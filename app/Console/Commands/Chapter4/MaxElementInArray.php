<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;

class MaxElementInArray extends Command
{
    protected $signature = 'app:max-element-in-array';

    protected $description = 'Глава 4. Разделяй и влавстуй';

    public function handle()
    {
        $arr = [1, 9, 3, 4, 5];

        $this->info("Arr " . print_r($arr));

        $max = $this->findMax($arr);

        $this->info("Max element for arr: $max");
    }

    private function findMax(array $arr): int
    {
        if ($this->countArray($arr) === 1) {
            return $arr[0];
        }

        $subMax = $this->findMax(array_slice($arr, 1));

        return max($arr[0], $subMax);
    }

    private function countArray(array $arr): int
    {
        if (empty($arr)) {
            return 0;
        }

        return 1 + $this->countArray(array_slice($arr, 1));
    }
}
