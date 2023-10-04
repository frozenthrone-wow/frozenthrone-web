<?php

namespace App\Classes\News;

use App\Classes\News\NewsRemove;
use App\DTO\NewsDTO;

class News implements NewsInterface {

    private NewsGet $NewsGet;
    private NewsRemove $NewsRemove;
    private NewsPost $NewsPost;

    function __construct() {
        $this->NewsGet = new NewsGet();
        $this->NewsRemove = new NewsRemove();
        $this->NewsPost = new NewsPost();
    }

	/**
     * Get list of news to display them on the website
     *
     * @param integer $id
     * @param boolean $latest
     * @return array
     */
	public function getNews(int $id = 0, bool $latest = false): array {
        return $this->NewsGet->get($id, $latest);
	}

	/**
	 * Post News from CPanel
     *
	 * @param NewsDTO $newsObject
	 * @return array
	 */
	public function postNews(NewsDTO $newsObject): array {

        return $this->NewsPost->post($newsObject);
	}

    /**
     * Deletes News
     *
     * @param integer $id
     * @return array
     */
    public function removeNews(int $id): array {
        return $this->NewsRemove->remove($id);
    }
}
