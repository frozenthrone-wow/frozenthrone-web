<?php

namespace App\Classes\Downloads;
use App\DTO\DownloadsDTO;
use Illuminate\Support\Facades\DB;

class DownloadsGet {

    function __construct(){}

    public function get(int $id = 0): array
    {
        $result = [
            'message' => 'Couldn\'t load Downloads. :(',
            'status' => 404,
            'payload' => []
        ];

        $Downloads = $this->getDownloadsFromDatabase($id);

        if(count($Downloads)) {
            $result = [
                'message' => '',
                'status' => 200,
                'payload' => $Downloads,
            ];
        }

        return $result;
    }

    private function getDownloadsFromDatabase(int $id = 0): array
    {

        $DownloadsArray = [];

        $query =
        'SELECT d.id as "DownloadID",
            d.link as "DownloadLink",
            d."date" as "DownloadDate",
            d.provider as "DownloadProvider"
        FROM website.downloads d
        '.($id ? ' WHERE d.id = :newsId AND d.active = true ' : ' WHERE d.active = true ' ).'
        ORDER BY d."date" DESC;';

        $parameters = [];
        if($id) {
            $parameters[':newsId'] = $id;
        }

        $DownloadsList = DB::select($query, $parameters);

        foreach($DownloadsList as $Downloads)
        {
            $Downloads = (array) $Downloads;
            $DownloadsObject = new DownloadsDTO(
                $Downloads['DownloadID'],
                $Downloads['DownloadLink'],
                $Downloads['DownloadProvider'],
                date('Y-m-d H:i',
                    strtotime($Downloads['DownloadDate'])),
            );

            $DownloadsArray[] = $DownloadsObject->toArray();
        }

        return $DownloadsArray;

    }
}
