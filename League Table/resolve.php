<?php

class LeagueTable
{
    public function __construct(array $players)
    {
        $this->standings = [];
        foreach ($players as $index => $p) {
            $this->standings[$p] = [
                'index' => $index,
                'name' => $p,
                'games_played' => 0,
                'score' => 0
            ];
        }
    }

    public function recordResult(string $player, int $score): void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank(int $rank): string
    {
        usort($this->standings, function ($a, $b) {
            if ($a['score'] > $b['score']) {
                return -1;
            } else if ($a['score'] < $b['score']) {
                return 1;
            }
            if ($a['games_played'] < $b['games_played']) {
                return -1;
            } else if ($a['games_played'] > $b['games_played']) {
                return 1;
            }

            if ($a['index'] < $b['index']) {
                return -1;
            }

            return 1;
        });

        return $this->standings[$rank - 1]['name'];
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);
