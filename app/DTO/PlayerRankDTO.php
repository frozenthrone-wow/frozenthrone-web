<?php
namespace App\DTO;

class PlayerRankDTO {
    private int $PlayerLevel;
    private string $PlayerName;
    private string $PlayerGuild;
    private string $PlayerClass;
    private string $PlayerResets;

    function __construct($PlayerLevel, $PlayerName, $PlayerGuild, $PlayerClass, $PlayerResets)
    {
        $this->PlayerLevel = $PlayerLevel;
        $this->PlayerName = $PlayerName;
        $this->PlayerGuild = $PlayerGuild;
        $this->PlayerClass = $PlayerClass;
        $this->PlayerResets = $PlayerResets;
    }

    public function toArray(): array
    {
        return [
            'PlayerLevel' => $this->PlayerLevel,
            'PlayerName' => $this->PlayerName,
            'PlayerGuild' => $this->PlayerGuild,
            'PlayerClass' => $this->PlayerClass,
            'PlayerResets' => $this->PlayerResets,
        ];
    }
}
