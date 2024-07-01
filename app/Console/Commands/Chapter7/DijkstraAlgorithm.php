<?php

namespace App\Console\Commands\Chapter7;

use Illuminate\Console\Command;

class DijkstraAlgorithm extends Command
{
    protected $signature = 'app:dijkstra-algorithm';

    protected $description = 'Command description';

    protected array $graph = [];
    protected array $costs = [];
    protected array $parents = [];
    protected array $processed = [];
    protected float $infinity = INF;

    public function handle(): void
    {
//        $this->initExampleFromBook();
        $this->initTaskOne();

        dump($this->costs, $this->parents);
        $this->algorithm();
        dump($this->costs, $this->parents);
    }

    private function initExampleFromBook(): void
    {
        $this->graph['start']      = [];
        $this->graph['start']['a'] = 6;
        $this->graph['start']['b'] = 2;
        $this->graph['a']          = [];
        $this->graph['a']['fin']   = 1;
        $this->graph['b']          = [];
        $this->graph['b']['a']     = 3;
        $this->graph['b']['fin']   = 5;
        $this->graph['fin']        = [];

        $this->costs['a']   = 6;
        $this->costs['b']   = 2;
        $this->costs['fin'] = $this->infinity;

        $this->parents['a']   = 'start';
        $this->parents['b']   = 'start';
        $this->parents['fin'] = null;
    }

    private function initTaskOne()
    {
        $this->graph['start']      = [];
        $this->graph['start']['a'] = 5;
        $this->graph['start']['b'] = 2;
        $this->graph['a']          = [];
        $this->graph['a']['c']     = 4;
        $this->graph['a']['d']     = 2;
        $this->graph['b']          = [];
        $this->graph['b']['a']     = 8;
        $this->graph['b']['d']     = 7;
        $this->graph['c']          = [];
        $this->graph['c']['d']     = 6;
        $this->graph['c']['fin']   = 3;
        $this->graph['d']          = [];
        $this->graph['d']['fin']   = 1;
        $this->graph['fin']        = [];

        $this->costs['a']   = 5;
        $this->costs['b']   = 2;
        $this->costs['c']   = $this->infinity;
        $this->costs['d']   = $this->infinity;
        $this->costs['fin'] = $this->infinity;

        $this->parents['a']   = 'start';
        $this->parents['b']   = 'start';
        $this->parents['c']   = null;
        $this->parents['d']   = null;
        $this->parents['fin'] = null;
    }

    private function initTaskTwo()
    {
        $this->graph['start']      = [];
        $this->graph['start']['a'] = 10;
        $this->graph['a']          = [];
        $this->graph['a']['b']     = 20;
        $this->graph['b']          = [];
        $this->graph['b']['c']     = 1;
        $this->graph['b']['fin']   = 30;
        $this->graph['c']          = [];
        $this->graph['c']['a']     = 1;
        $this->graph['fin']        = [];

        $this->costs['a']   = 10;
        $this->costs['b']   = $this->infinity;
        $this->costs['c']   = $this->infinity;
        $this->costs['fin'] = $this->infinity;

        $this->parents['a']   = 'start';
        $this->parents['c']   = null;
        $this->parents['b']   = null;
        $this->parents['fin'] = null;
    }

    private function algorithm(): void
    {
        $node = $this->indLowestCostNode($this->costs);

        while ($node) {
            $cost       = $this->costs[$node];
            $neighbours = $this->graph[$node];

            foreach ($neighbours as $n => $neighbour) {
                $newCost = $cost + $neighbour;

                if ($this->costs[$n] > $newCost) {
                    $this->costs[$n]   = $newCost;
                    $this->parents[$n] = $node;
                }
            }
            $this->processed[] = $node;
            $node              = $this->indLowestCostNode($this->costs);
        }
    }

    private function indLowestCostNode(array $costs): int|string|null
    {
        $lowestCost     = $this->infinity;
        $lowestCostNode = null;

        foreach ($costs as $node => $cost) {
            if ($cost < $lowestCost && !in_array($node, $this->processed, true)) {
                $lowestCost     = $cost;
                $lowestCostNode = $node;
            }
        }

        return $lowestCostNode;
    }
}
