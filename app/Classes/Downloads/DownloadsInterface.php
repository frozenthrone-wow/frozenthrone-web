<?php
namespace App\Classes\Downloads;

use App\DTO\DownloadsDTO;

interface DownloadsInterface {

    /**
     * Get list of Downloads to display them on the website
     *
     * @param int $id
     * @return array
     */
    public function getDownloads(int $id): array;

    /**
     * Post Downloads from CPanel
     *
     * @param DownloadsDTO $DownloadsObject
     * @return array
     */
    public function postDownloads(
        DownloadsDTO $DownloadsObject
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
