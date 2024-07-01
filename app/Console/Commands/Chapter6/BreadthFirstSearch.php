<?php

namespace App\Console\Commands\Chapter6;

use Illuminate\Console\Command;

class BreadthFirstSearch extends Command
{
    protected $signature = 'app:breadth-first-search';

    protected $description = 'Command description';

    protected array $graph = [];
    protected array $searched = [];
    protected array $searchQueue = [];

    public function __construct()
    {
        $this->graph = [
            "you"    => ["alice", "bob", "claire"],
            "bob"    => ["anuj", "peggy"],
            "alice"  => ["peggy"],
            "claire" => ["thom", "jonny"],
            "anuj"   => [],
            "peggy"  => [],
            "thom"   => [],
            "jonny"  => []
        ];

        parent::__construct();
    }

    public function handle()
    {
        $this->search('you');
    }

    public function search($name): bool
    {
        $this->searchQueue = array_merge($this->searchQueue, $this->graph[$name]);

        while (!empty($this->searchQueue)) {
            $person = array_shift($this->searchQueue);

            if ($this->personIsSeller($person) && !in_array($person, $this->searched)) {
                $this->info($person . " is a mango seller!");
                return true;
            }

            $this->searchQueue = array_merge($this->searchQueue, $this->graph[$person]);
            $this->searched[]  = $person;
        }
        return false;
    }

    private function personIsSeller($person): bool
    {
        return str_ends_with($person, 'm');
    }
}
