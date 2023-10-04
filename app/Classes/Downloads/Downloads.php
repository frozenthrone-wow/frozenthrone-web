<?php

namespace App\Classes\Downloads;
use App\DTO\DownloadsDTO;

class Downloads implements DownloadsInterface {

    private DownloadsGet $DownloadsGet;
    private DownloadsRemove $DownloadsRemove;
    private DownloadsPost $DownloadsPost;

    function __construct() {
        $this->DownloadsGet = new DownloadsGet();
        $this->DownloadsRemove = new DownloadsRemove();
        $this->DownloadsPost = new DownloadsPost();
    }

	/**
     * Get list of downloads to display them on the website
     *
     * @param int $id
     * @return array
     */
	public function getDownloads(int $id = 0): array {
        return $this->DownloadsGet->get($id);
	}

	/**
	 * Post downloads from CPanel
     *
	 * @param DownloadsDTO $DownloadsObject
	 * @return array
	 */
	public function postDownloads(DownloadsDTO $downloadsObject): array {
        return $this->DownloadsPost->post($downloadsObject);
	}

    /**
     * Deletes Download
     *
     * @param int $id
     * @return array
     */
    public function removeDownload(int $id): array
    {
        return $this->DownloadsRemove->remove($id);
    }
}
