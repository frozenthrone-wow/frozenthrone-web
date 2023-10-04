<?php

namespace App\Http\Controllers;

use App\Classes\News\News;


class WebsiteController extends Controller
{
    public function home(): object
    {
        $LatestNews = (new News())->getNews(0, true);

        if($LatestNews['status'] == 200) // news found
            $LatestNews = $LatestNews['payload'][0];
        else
            $LatestNews = false;


        return view('home', [
            'LatestNews' => $LatestNews
        ]);
    }

}
