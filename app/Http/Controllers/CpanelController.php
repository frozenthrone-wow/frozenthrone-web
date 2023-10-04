<?php

namespace App\Http\Controllers;

use App\Classes\Cpanel\Cpanel;
use App\Classes\Utility\Output;
use App\DTO\DownloadsDTO;
use App\DTO\NewsDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CpanelController extends Controller
{

    private Cpanel $Cpanel;

    function __construct(){
        $this->Cpanel = new Cpanel();
    }

    public function home() : object
    {
        return view (
            'cpanel.home'
        );
    }

    #region CPANEL NEWS
    public function news() : object
    {
        $existingNews = $this->Cpanel->getNews();

        return view(
            'cpanel.news.news',
            [
                'News' => $existingNews,
            ]
        );
    }

    public function postNews(Request $request) : object
    {
        if($request->PostTitle == null || $request->PostBody == null) {
            return Output::make('', 500);
        }

        $NewsDTO = new NewsDTO(
            $request->PostID,
            $request->PostTitle,
            $request->PostBody,
            '',
            '',
        );

        $result = $this->Cpanel->postNews($NewsDTO);

        return Output::make($result['message'], $result['status']);
    }

    public function removeNews(Request $request, int $id = 0) : object
    {
        if($id)
            $result = $this->Cpanel->removeNews($id);
        else $result = [
            'message' => "No news found",
            "status" => 404
        ];

        return Output::make($result['message'], $result['status']);
    }
    #endregion


    #region CPANEL DOWNLOADS
    public function downloads() : object
    {
        $existingDownloads = $this->Cpanel->getDownloads();

        return view(
            'cpanel.downloads.downloads',
            [
                'Downloads' => $existingDownloads,
            ]
        );
    }

    public function postDownloads(Request $request) : object
    {
        if($request->DownloadLink == null || $request->DownloadProvider == null) {
            return Output::make('', 500);
        }

        $DownloadDTO = new DownloadsDTO(
            $request->DownloadId,
            $request->DownloadLink,
            $request->DownloadProvider,
            date('Y-m-d H:i'),
        );

        $result = $this->Cpanel->postDownloads($DownloadDTO);

        return Output::make($result['message'], $result['status']);
    }

    public function removeDownloads(Request $request, int $id = 0) : object
    {

        if($id)
            $result = $this->Cpanel->removeDownload($id);
        else $result = [
            'message' => 'No download found',
            'status' => 404
        ];
        return Output::make($result['message'], $result['status']);
    }
    #endregion

    public function authenticate() : object
    {
        Session::put('cpanel', null);
        return view(
            'cpanel.login'
        );
    }
}
