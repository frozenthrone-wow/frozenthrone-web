<?php

namespace App\Classes\Utility;
use Illuminate\Support\Facades\DB;
class WOWDB {
    /**
     * Executes a SELECT statement on WOW database
     *
     * @param string $query SELECT query to execute
     * @param array $parameters SELECT query parameters
     * @param bool $useReadPdo Default empty
     * @return object
     */
    public static function select(string $query, array $parameters, bool $useReadPdo = true): array
    {
        $wowDB = DB::connection('wow');
        return $wowDB->select($query, $parameters, $useReadPdo);
    }

    /**
     * Executes a INSERT statement on WOW database
     *
     * @param string $query INSERT query to execute
     * @param array $parameters INSERT query parameters
     * @return object
     */
    public static function insert(string $query, array $parameters): bool
    {
        $wowDB = DB::connection('wow');
        return $wowDB->insert($query, $parameters);
    }


}
