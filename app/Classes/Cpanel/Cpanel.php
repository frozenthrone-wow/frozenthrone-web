<?php

namespace App\Classes\Cpanel;

use App\Classes\Downloads\Downloads;
use App\Classes\News\News;
use App\DTO\NewsDTO;
use App\DTO\DownloadsDTO;


class Cpanel implements CpanelInterface{
    private News $News;
    private Downloads $Downloads;

    function __construct()
    {
        $this->News = new News();
        $this->Downloads = new Downloads();
    }

    #region CPANEL NEWS CONTROL
    /**
     * Get list of News for CPanel
     *
     * @return array
     */
    public function getNews(int $id = 0): array
    {
        return $this->News->getNews($id);
    }

    /**
     * Post new News or edit existing one
     *
     * @param NewsDTO $news
     * @return array
     */
    public function postNews(NewsDTO $news): array
    {
        return $this->News->postNews($news);
    }

    /**
     * Deletes News
     *
     * @param integer $id
     * @return array
     */
    public function removeNews(int $id): array
    {
        return $this->News->removeNews($id);
    }

    #endregion

    #region CPANEL DOWNLOADS CONTROL
    /**
     * Get Downloads list for CPanel
     *
     * @return array
     */
    public function getDownloads(): array
    {
        return $this->Downloads->getDownloads();
    }


    /**
     * Post new Download link
     *
     * @param DownloadsDTO $downloads
     * @return array
     */
    public function postDownloads(DownloadsDTO $downloads): array
    {
        return $this->Downloads->postDownloads($downloads);
    }

    /**
     * Deletes Download
     *
     * @param int $id
     * @return array
     */
    public function removeDownload(int $id): array
    {
        return $this->Downloads->removeDownload($id);
    }

    #endregion
}
