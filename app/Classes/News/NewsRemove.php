<?php

namespace App\Classes\News;
use Illuminate\Support\Facades\DB;

class NewsRemove {

    function __construct(){}

    public function remove(int $id = 0): array
    {
        $result = [
            'message' => 'Couldn\'t remove News. :(',
            'status' => 500,
            'payload' => []
        ];

        $Downloads = $this->removeNewsFromDatabase($id);

        if(count($Downloads)) {
            $result = [
                'message' => 'News removed',
                'status' => 200,
                'payload' => ''
            ];
        }

        return $result;
    }

    private function removeNewsFromDatabase(int $id = 0): array
    {
        $query =
        'UPDATE website.news
        SET active=false
        WHERE id=:newsId;';

        $parameters = [];
        if($id) {
            $parameters[':newsId'] = $id;
        }

        $NewsRemove = DB::update($query, $parameters);

        if($NewsRemove) {
            return [
                'message' => 'News removed',
                'status' => 200,
            ];
        }

        return [
            'message' => 'Couldn\'t remove News. :(',
            'status' => 500,
        ];

    }
}
