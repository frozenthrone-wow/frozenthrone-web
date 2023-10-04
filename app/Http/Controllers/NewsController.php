<?php

namespace App\Http\Controllers;

use App\Classes\News\News;
use App\Classes\Utility\Output;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function getNews(Request $request): object
    {

        $News = new News();
        $newsList = $News->getNews();

        $Output = Output::make(
            $newsList['message'],
            $newsList['status'],
            $newsList['payload']
        );
        return $Output;
    }

    public function getSpecificNews(int $id, Request $request): object
    {

        $News = new News();
        $newsList = $News->getNews($id);

        $Output = Output::make(
            $newsList['message'],
            $newsList['status'],
            $newsList['payload']
        );
        return $Output;
    }

}
