<?php

namespace App\Classes\News;
use App\DTO\NewsDTO;
use Illuminate\Support\Facades\DB;

class NewsGet {

    function __construct(){}

    public function get(int $id = 0, bool $latest = false): array
    {
        $result = [
            'message' => 'Couldn\'t load news. :(',
            'status' => 404,
            'payload' => []
        ];

        $news = $this->getNewsFromDatabase($id, $latest);

        if(count($news)) {
            $result = [
                'message' => '',
                'status' => 200,
                'payload' => $news,
            ];
        }

        return $result;
    }

    private function getNewsFromDatabase(int $newsId = 0, bool $latest = false): array
    {

        $newsArray = [];

        $query =
        'SELECT n.id as "PostID",
            n.title AS "PostTitle",
            n.body AS "PostBody",
            n.post_date AS "PostDate",
            COALESCE(a.nickname, \'Team\') AS "PostedBy"
        FROM website."news" n
        JOIN website."access" a
            ON a.id = n.posted_by
        '.($newsId ? 'WHERE n.id = :newsId AND n.active = true' : 'WHERE n.active = true').'
        ORDER BY n.post_date DESC
        '.( $latest ? 'LIMIT 1' : '');

        $parameters = [];

        if($newsId) {
            $parameters = [':newsId' => $newsId];
        }

        $newsList = DB::select($query, $parameters);

        foreach($newsList as $news)
        {
            $news = (array) $news;
            $newsObject = new NewsDTO(
                $news['PostID'],
                $news['PostTitle'],
                $news['PostBody'],
                date('Y-m-d H:i',
                    strtotime($news['PostDate'])),
                $news['PostedBy'],
            );

            $newsArray[] = $newsObject->toArray();
        }

        return $newsArray;

    }
}
