<?php

namespace App\Console\Commands\Chapter4;

use Illuminate\Console\Command;

class MultiplicationTable extends Command
{
    protected $signature = 'app:multiplication-table';

    protected $description = 'Глава 4. Разделяй и влавстуй
    Создание таблицы умножения для всех элементов массива.
    Например, если массив состоит из элементов [2, 3, 7, 8, 10],
    сначала каждый элемент умножается на 2,
    затем каждый элемент умножается на 3, затем на 7 и т. д.';

    public function handle()
    {
        $arr = [2, 3, 7, 8, 10];

        $multiplicationTable = $this->generateMultiplicationTable($arr);

        echo implode(' ', $arr) . "\n";

        foreach ($multiplicationTable as $row) {
            echo implode(' ', $row) . "\n";
        }
    }

    private function generateMultiplicationTable($arr): array|int
    {
        $result = [];
        foreach ($arr as $multiplier) {
            $result[] = $this->multiplication($arr, $multiplier);
        }
        return $result;
    }

    private function multiplication(array $arr, int $multiplier): array|int
    {
        $count = count($arr);

        if ($count === 0) {
            return 0;
        }

        if ($count === 1) {
            return [$arr[0] * $multiplier];
        }

        $mid        = intdiv(count($arr), 2);
        $leftArray  = array_slice($arr, 0, $mid);
        $rightArray = array_slice($arr, $mid);

        $leftResult  = $this->multiplication($leftArray, $multiplier);
        $rightResult = $this->multiplication($rightArray, $multiplier);

        return array_merge($leftResult, $rightResult);
    }
}
