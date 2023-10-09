<?php

namespace App\Classes\Stats;

use App\Classes\Stats\StatsInterface;


class Stats implements StatsInterface
{

    private StatsOnlinePlayerCount $StatsOnlinePlayerCount;
    private StatsServerStatistics $StatsServerStatistics;

    function __construct()
    {
        $this->StatsOnlinePlayerCount = new StatsOnlinePlayerCount();
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
     * Get the number of accounts, characters and guilds
     *
     * @return array
     */
    public function getServerStats(): array
    {
        return $this->StatsServerStatistics->get();
    }
}
