<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;

class RecursionBinarySearch extends Command
{
    protected $signature = 'app:recursion-binary-search';

    protected $description = 'Глава 4. Разделяй и влавстуй';

    public function handle()
    {
        $arr = [1, 2, 3, 4, 5];

        $this->info("Arr " . print_r($arr, true));

        $result = $this->search($arr, 3, 0, count($arr) - 1);

        $this->info("Result: $result");
    }

    private function search(array $arr, int $item, int $low, int $high): int|string
    {
        if ($low > $high) {
            return 'Item not in array';
        }

        $mid   = (int)(($low + $high) / 2);
        $guess = $arr[$mid];

        if ($guess === $item) {
            return $mid;
        }

        if ($guess > $item) {
            return $this->search($arr, $item, $low, $mid - 1);
        }

        return $this->search($arr, $item, $mid + 1, $high);
    }
}
