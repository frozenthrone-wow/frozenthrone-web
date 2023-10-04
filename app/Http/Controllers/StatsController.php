<?php

namespace App\Http\Controllers;

use App\Classes\Stats\Stats;
use App\Classes\Utility\Output;

class StatsController extends Controller
{

    private Stats $Stats;

    function __construct()
    {
        $this->Stats = new Stats();
    }

    public function getOnlinePlayerCount() : object
    {
        $result = $this->Stats->getOnlinePlayerCount();
        return Output::make(
            $result['message'],
            $result['status'],
            $result['payload'],
        );
    }

    public function getPlayerRanking() : object
    {
        $result = $this->Stats->getTopPlayerRanking();
        return Output::make(
            $result['message'],
            $result['status'],
            $result['payload'],
        );
    }

    public function getServerStatistics() : object
    {
        $result = $this->Stats->getServerStats();
        return Output::make(
            $result['message'],
            $result['status'],
            $result['payload'],
        );
    }
}
