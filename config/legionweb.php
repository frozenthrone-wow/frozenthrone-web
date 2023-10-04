<?php

return [
    'server' => [
        'name' => 'Classic MU',
        'version' => 'v5.1',
        'about' => [
            'expRate' => 1,
            'dropRate' => 1,

            'enableOnlineGadget' => false,
            'enableRankingGadget' => true,
            'enableStatsGadget' => true,

            'topRankingNumber' => 5,
        ],
    ],

    'registration' => [
        'username' => [
            'maxChar' => 10,
            'minChar' => 5,
        ],
        'password' => [
            'maxChar' => 32,
            'minChar' => 6,
        ],
    ],

    'core' => [
        'name' => "legionweb",
        'version' => '1.0.3'
    ]
];
