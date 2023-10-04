<?php
namespace App\DTO;

class ServerStatsDTO {
    private int $Accounts;
    private int $Characters;
    private int $Guilds;


    function __construct($Accounts, $Characters, $Guilds)
    {
        $this->Accounts = $Accounts;
        $this->Characters = $Characters;
        $this->Guilds = $Guilds;
    }

    public function toArray(): array
    {
        return [
            'Accounts' => $this->Accounts,
            'Characters' => $this->Characters,
            'Guilds' => $this->Guilds,
        ];
    }
}
