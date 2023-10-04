<?php

namespace App\Classes\News;
use App\DTO\NewsDTO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewsPost {

    function __construct(){}

    public function post(NewsDTO $object): array
    {
        $result = [
            'message' => 'Couldn\'t post News. :(',
            'status' => 404,
            'payload' => []
        ];


        $News = $this->postNewsToDatabase($object);

        return $News;
    }

    private function postNewsToDatabase(NewsDTO $object): array
    {

        $object->setAuthor(Session::get('cpanel')['id']);

        $response = [
            'message' => 'News posted successfully',
            'status' => 200,
            'payload' => [],
        ];

        $query = 'INSERT INTO website.news
        (title, body, post_date, posted_by, active)
        VALUES(:title, :body, now(), :posted_by, true);';

        $newsPostResult = DB::insert(
            $query,
            [
                ":title" => $object->toArray()['PostTitle'],
                ":body" => $object->toArray()['PostBody'],
                ":posted_by" => $object->toArray()['PostedBy'],
            ]
        );

        if(!$newsPostResult) {
            $response['message'] = 'Error adding News.';
            $response['status'] = 500;
        }

        return $response;
    }
}
