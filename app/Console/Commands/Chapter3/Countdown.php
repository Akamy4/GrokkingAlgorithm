<?php

namespace App\Console\Commands\Chapter3;

use Illuminate\Console\Command;

class Countdown extends Command
{
    protected $signature = 'app:countdown';

    protected $description = '3 глава рекурсия. Тут сделан отчет через рекурсию';

    public function handle()
    {
        $this->info('Countdown');
        $this->countdown(5);
        $this->info('Thank you for waiting <3');
    }

    private function countdown(int $i): void
    {
        $this->info("$i ...");
        sleep(1);

        if ($i <= 0) {
            return;
        }

        $this->countdown($i - 1);
    }
}
