<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;

class CountArray extends Command
{
    protected $signature = 'app:count-array';

    protected $description = 'Глава 4. Разделяй и влавстуй';

    public function handle()
    {
        $arr = [1,2,3,4,5];

        $this->info("Arr " . print_r($arr));

        $count = $this->countArray($arr);

        $this->info("Count array for arr: $count");
    }

    private function countArray(array $arr): int
    {
        if (empty($arr)) {
            return 0;
        }

        return 1 + $this->countArray(array_slice($arr, 1));
    }
}
