<?php

namespace App\Classes\Downloads;
use Illuminate\Support\Facades\DB;

class DownloadsRemove {

    function __construct(){}

    public function remove(int $id = 0): array
    {
        $result = [
            'message' => 'Couldn\'t remove Download. :(',
            'status' => 500,
            'payload' => []
        ];

        $Downloads = $this->removeDownloadsFromDatabase($id);

        if(count($Downloads)) {
            $result = [
                'message' => 'Download removed',
                'status' => 200,
                'payload' => ''
            ];
        }

        return $result;
    }

    private function removeDownloadsFromDatabase(int $id = 0): array
    {



        $query =
        'UPDATE website.downloads
        SET active=false
        WHERE id=:newsId;';

        $parameters = [];
        if($id) {
            $parameters[':newsId'] = $id;
        }

        $DownloadRemove = DB::update($query, $parameters);

        if($DownloadRemove) {
            return [
                'message' => 'Download removed',
                'status' => 200,
            ];
        }

        return [
            'message' => 'Couldn\'t remove Download. :(',
            'status' => 500,
        ];

    }
}
