<?php

namespace App\Classes\Stats;
use App\DTO\ServerStatsDTO;
use App\Classes\Utility\WOWDB;

class StatsServerStatistics {

    function __construct(){}

    public function get(): array
    {
        $result = [
            'message' => 'No statistics available',
            'status' => 404,
            'payload' => []
        ];

        $GetServerStats = $this->getGetServerStatsFromDatabase();

        if(count($GetServerStats)) {
            $result = [
                'message' => '',
                'status' => 200,
                'payload' => $GetServerStats,
            ];
        }

        return $result;
    }

    private function getGetServerStatsFromDatabase(): array
    {

        $ServerStatsArray = [];

        $query =
        'SELECT count(*) as `count`
        FROM legion_auth.account a
        UNION ALL
        SELECT count(*) as `count`
        FROM legion_characters.`characters` c
        UNION ALL
        SELECT count(*) as `count`
        FROM legion_characters.guild g ';

        $parameters = [];

        $ServerStatisticsObject = WOWDB::select($query, $parameters);
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
