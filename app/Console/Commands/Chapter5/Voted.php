<?php

namespace App\Console\Commands\Chapter5;

use Illuminate\Console\Command;

class Voted extends Command
{
    protected $signature = 'app:voted';

    protected $description = 'Глава 5. Хэш таблицы. Голосование';

    private array $voted = [];

    public function handle()
    {
        $this->canVote("Tom");
        $this->canVote("Akame");
        $this->canVote("Tom");
    }

    public function canVote(string $name): void
    {
        if (array_key_exists($name, $this->voted)) {
            $this->info("$name can`t  vote");
            return;
        }

        $this->voted[$name] = true;
        $this->info("$name can vote");
    }
}
