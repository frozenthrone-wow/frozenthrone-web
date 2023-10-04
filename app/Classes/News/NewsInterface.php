<?php
namespace App\Classes\News;

use App\DTO\NewsDTO;

interface NewsInterface {

    /**
     * Get list of news to display them on the website
     *
     * @param integer $id
     * @param boolean $latest
     * @return array
     */
    public function getNews(
        int $id = 0, bool $latest = false
    ): array;

    /**
     * Post News from CPanel
     *
     * @param NewsDTO $newsObject
     * @return array
     */
    public function postNews(
        NewsDTO $newsObject
    ): array;


    /**
     * Deletes News
     *
     * @param integer $id
     * @return array
     */
    public function removeNews(
        int $id
    ): array;
}
