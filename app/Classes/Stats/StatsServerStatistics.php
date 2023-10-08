<?php

namespace App\Classes\Stats;
use App\DTO\ServerStatsDTO;
use Illuminate\Support\Facades\DB;

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

        // $query =
        // 'SELECT count(a) COUNT FROM data."Account" a
        // UNION ALL
        // SELECT count(c) COUNT FROM data."Character" c
        // UNION ALL
        // SELECT count(g) COUNT FROM guild."Guild" g';

        // $parameters = [];

        // $ServerStatisticsObject = DB::select($query, $parameters);
        // $ServerStatistics = [];
        // foreach($ServerStatisticsObject as $StatisticsObject)
        // {
        //     $ServerStatistics[] = ((array) $StatisticsObject)['count'];
        // }

        // $ServerStatsArray = new ServerStatsDTO(
        //     $ServerStatistics[0],
        //     $ServerStatistics[1],
        //     $ServerStatistics[2],
        // );

        return $ServerStatsArray->toArray();

    }
}
