<?php

return [
    'server' => [
        'name' => 'Burning Legion',
        'version' => 'v7.3.5',
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
        'version' => '1.0.0'
    ]
];
