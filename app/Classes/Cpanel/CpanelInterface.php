<?php
namespace App\Classes\Cpanel;

use App\DTO\DownloadsDTO;
use App\DTO\NewsDTO;

interface CpanelInterface {

    /**
     * Get list of News for CPanel
     *
     * @return array
     */
    public function getNews(): array;

    /**
     * Post new News or edit existing one
     *
     * @param NewsDTO $news
     * @return array
     */
    public function postNews(
        NewsDTO $news
    ): array;

    /**
     * Get Downloads list for CPanel
     *
     * @return array
     */
    public function getDownloads(): array;

    /**
     * Deletes News
     *
     * @param integer $id
     * @return array
     */
    public function removeNews(
        int $id
    ): array;

    /**
     * Post new Download link
     *
     * @param DownloadsDTO $downloads
     * @return array
     */
    public function postDownloads(
        DownloadsDTO $downloads
    ): array;

    /**
     * Deletes Download
     *
     * @param int $id
     * @return array
     */
    public function removeDownload(
        int $id
    ): array;
}
