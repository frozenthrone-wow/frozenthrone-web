<?php

namespace App\Classes\Stats;

use App\Classes\Stats\StatsInterface;

class Stats implements StatsInterface
{

    private StatsPlayerRanking $StatsPlayerRanking;
    private StatsServerStatistics $StatsServerStatistics;

    function __construct()
    {
        $this->StatsPlayerRanking = new StatsPlayerRanking();
        $this->StatsServerStatistics = new StatsServerStatistics();
    }

    /**
     * Get the number of online players
     *
     * @return array
     */
    public function getOnlinePlayerCount(): array
    {
        return [
            'message' => '',
            'status' => 200,
            'payload' => ['players' => 0],
        ];
    }

    /**
     * Get the TOP X player ranking
     *
     * @return array
     */
    public function getTopPlayerRanking(): array
    {
        return $this->StatsPlayerRanking->get();
    }

    /**
     * Get the number of accounts, characters and guilds
     *
     * @return array
     */
    public function getServerStats(): array
    {
        return $this->StatsServerStatistics->get();
    }
}
