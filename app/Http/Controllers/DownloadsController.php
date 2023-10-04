<?php

namespace App\Http\Controllers;

use App\Classes\Downloads\Downloads;
use App\Classes\Utility\Output;

class DownloadsController extends Controller
{
    public function getDownloads(int $id = 0): object
    {

        $Downloads = new Downloads();
        $newsList = $Downloads->getDownloads($id);

        $Output = Output::make(
            $newsList['message'],
            $newsList['status'],
            $newsList['payload']
        );
        return $Output;
    }
}
