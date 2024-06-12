<?php

namespace App\Console\Commands\Chapter3;

use Illuminate\Console\Command;

class Factorial extends Command
{
    protected $signature = 'app:factorial';

    protected $description = '3 глава рекурсия. Тут сделан факториал через рекурсию';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $i = 5;

        $this->info("Factorial for $i");

        $fact = $this->fact($i);

        $this->info("Result: $fact");
    }

    private function fact($i)
    {
        if ($i === 1) {
            return 1;
        }

        return $i * $this->fact($i - 1);
    }
}
