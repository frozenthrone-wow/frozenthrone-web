<?php
namespace App\DTO;

class NewsDTO {
    private int $PostID;
    private string $PostTitle;
    private string $PostBody;
    private string $PostDate;
    private string $PostedBy;

    function __construct($PostID, $PostTitle, $PostBody, $PostDate, $PostedBy)
    {
        $this->PostID = $PostID;
        $this->PostTitle = $PostTitle;
        $this->PostBody = $PostBody;
        $this->PostDate = $PostDate;
        $this->PostedBy = $PostedBy;
    }

    public function toArray(): array
    {
        return [
            'PostID' => $this->PostID,
            'PostTitle' => $this->PostTitle,
            'PostBody' => $this->PostBody,
            'PostDate' => $this->PostDate,
            'PostedBy' => $this->PostedBy,
        ];
    }

    public function setAuthor(string $name): void
    {
        $this->PostedBy = $name;
    }
}
