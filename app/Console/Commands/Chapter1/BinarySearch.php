<?php


namespace App\Console\Commands\Chapter1;

use Illuminate\Console\Command;

class BinarySearch extends Command
{
    protected $signature = 'app:binary-search';

    protected $description = 'Бинарный поиск';

    public function handle()
    {
        $myList = [1, 3, 5, 7, 9, 11, 13, 17];
        $item1  = 5;
        $item2  = 20;
        $this->info("Searching first item $item1");
        $result = $this->binarySearch($myList, $item1);
        $this->info("Result for first item $result");

        $this->info("Searching second item $item2");
        $result = $this->binarySearch($myList, $item2);
        $this->info("Result for second item $result");
    }

    private function binarySearch(array $list, int $item): int|string
    {
        $low  = 0;
        $high = count($list) - 1;

        while ($low <= $high) {
            $mid = (int)(($high + $low) / 2);

            $guess = $list[$mid];

            if ($guess === $item) {
                return $mid;
            }

            if ($guess > $item) {
                $high = $mid - 1;
            }

            if ($guess < $item) {
                $low = $mid + 1;
            }
        }

        return 'Item not in array';
    }
}
