<?php

namespace App\Classes\Downloads;
use App\DTO\DownloadsDTO;
use Illuminate\Support\Facades\DB;

class DownloadsPost {

    function __construct(){}

    public function post(DownloadsDTO $object): array
    {
        $result = [
            'message' => 'Couldn\'t post Download. :(',
            'status' => 404,
            'payload' => []
        ];


        $Downloads = $this->postDownloadsToDatabase($object);

        return $Downloads;
    }

    private function postDownloadsToDatabase(DownloadsDTO $object): array
    {
        $response = [
            'message' => 'Download posted successfully',
            'status' => 200,
            'payload' => [],
        ];

        $query = 'INSERT INTO website.downloads
        (link, "date", provider, active)
        VALUES(:link, now(), :provider, true);';

        $downloadPostResult = DB::insert(
            $query,
            [
                ":link" => $object->toArray()['DownloadLink'],
                ":provider" => $object->toArray()['DownloadProvider'],
            ]
        );


        if(!$downloadPostResult) {
            $response['message'] = 'Error adding download.';
            $response['status'] = 500;
        }


        return $response;
    }
}
