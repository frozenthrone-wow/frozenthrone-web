<?php

namespace App\Classes\Stats;
use App\DTO\PlayerRankDTO;
use Illuminate\Support\Facades\DB;

class StatsPlayerRanking {

    function __construct(){}

    public function get(): array
    {
        $result = [
            'message' => 'No ranking available',
            'status' => 404,
            'payload' => []
        ];

        $PlayerRanks = $this->getPlayerRanksFromDatabase();

        if(count($PlayerRanks)) {
            $result = [
                'message' => '',
                'status' => 200,
                'payload' => $PlayerRanks,
            ];
        }

        return $result;
    }

    private function getPlayerRanksFromDatabase(): array
    {

        $PlayerRanksArray = [];

        $query =
        'SELECT c."Name" PlayerName, resetsStat."Value" PlayerResets, levelStat."Value" PlayerLevel, cl."Name" PlayerClass
        FROM data."Character" c,
            data."StatAttribute" levelStat,
            data."StatAttribute" resetsStat,
            config."AttributeDefinition" levelDef,
            config."AttributeDefinition" resetsDef,
            config."CharacterClass" cl
        WHERE levelStat."CharacterId" = c."Id"
            AND resetsStat."CharacterId" = c."Id"
            AND levelStat."DefinitionId" = levelDef."Id"
            AND resetsStat."DefinitionId" = resetsDef."Id"
            AND c."CharacterClassId" = cl."Id"
            AND levelDef."Designation" = \'Level\'
            AND resetsDef."Designation" = \'Resets\'
        ORDER BY resetsStat."Value" DESC, levelStat."Value" DESC
        LIMIT :row_count';

        $parameters = [];
        $parameters[':row_count'] = config('legionweb.server.about.topRankingNumber');

        $RankingList = DB::select($query, $parameters);

        foreach($RankingList as $Ranking)
        {
            $Ranking = (array) $Ranking;
            $RankingObject = new PlayerRankDTO(
                $Ranking['playerlevel'],
                $Ranking['playername'],
                '',
                $Ranking['playerclass'],
                $Ranking['playerresets'],
            );

            $PlayerRanksArray[] = $RankingObject->toArray();
        }

        return $PlayerRanksArray;

    }
}
