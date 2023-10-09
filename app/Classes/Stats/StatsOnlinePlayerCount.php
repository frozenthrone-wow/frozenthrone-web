<?php

namespace App\Classes\Stats;
use App\DTO\ServerStatsDTO;
use Illuminate\Support\Facades\DB;

class StatsOnlinePlayerCount {

    private array $Realms;

    function __construct(){

    }

    public function get(): array
    {
        $result = [
            'message' => 'No statistics available',
            'status' => 404,
            'payload' => []
        ];

        $GetOnlinePlayerCount = $this->getGetOnlinePlayerCountFromDatabase();

        if(count($GetOnlinePlayerCount)) {
            $result = [
                'message' => '',
                'status' => 200,
                'payload' => $GetOnlinePlayerCount,
            ];
        }

        return $result;
    }

    private function getGetOnlinePlayerCountFromDatabase(): array
    {

        $ServerStatsArray = [];

        $query =
        '';

        $parameters = [];

        $ServerStatisticsObject = DB::select($query, $parameters);
        $ServerStatistics = [];
        foreach($ServerStatisticsObject as $StatisticsObject)
        {
            $ServerStatistics[] = ((array) $StatisticsObject)['count'];
        }

        $ServerStatsArray = new ServerStatsDTO(
            $ServerStatistics[0],
            $ServerStatistics[1],
            $ServerStatistics[2],
        );

        return $ServerStatsArray->toArray();

    }
}
