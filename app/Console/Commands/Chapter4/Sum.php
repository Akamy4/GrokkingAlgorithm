<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;
use function PHPUnit\Framework\isEmpty;

class Sum extends Command
{
    protected $signature = 'app:sum';

    protected $description = 'Глава 4. Разделяй и влавстуй';

    public function handle()
    {
        $arr = [1,2,3,4,5];

        $this->info("Arr " . print_r($arr));

        $sum = $this->sum($arr);

        $this->info("Sum for arr: $sum");
    }

    private function sum(array $arr): int
    {
        if (empty($arr)) {
            return 0;
        }

        return $arr[0] + $this->sum(array_slice($arr, 1));
    }
}
