<?php
namespace App\Classes\Stats;

interface StatsInterface {

    /**
     * Get the number of online players
     *
     * @return integer
     */
    public function getOnlinePlayerCount(): array;

    /**
     * Get the number of accounts, characters and guilds
     *
     * @return array
     */
    public function getServerStats(): array;
}
