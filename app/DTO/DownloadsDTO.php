<?php
namespace App\DTO;

class DownloadsDTO {
    private int $DownloadID;
    private string $DownloadLink;
    private string $DownloadDate;
    private string $DownloadProvider;

    function __construct($DownloadID, $DownloadLink,$DownloadProvider, $DownloadDate)
    {
        $this->DownloadID = $DownloadID;
        $this->DownloadLink = $DownloadLink;
        $this->DownloadDate = $DownloadDate;
        $this->DownloadProvider = $DownloadProvider;
    }

    public function toArray(): array
    {
        return [
            'DownloadID' => $this->DownloadID,
            'DownloadLink' => $this->DownloadLink,
            'DownloadDate' => $this->DownloadDate,
            'DownloadProvider' => $this->DownloadProvider,
        ];
    }
}
