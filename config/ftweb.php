<?php

return [
    'server' => [
        'name' => 'Frozen Throne',
        'version' => 'v3.3.5',
        'about' => [
            'expRate' => 1,
            'dropRate' => 1,

            'enableStatsGadget' => true,
        ],
    ],

    'realms' => [
        [
            'id' => 1,
            'name' => 'Hailstorm',
            'build' => '12340',
            'address' => 'frozenthrone.wow'
        ],
        [
            'id' => 2,
            'name' => 'HailstormTest',
            'build' => '12340',
            'address' => 'frozenthrone.wow:3420'
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
        'name' => "frozenthrone_web",
        'version' => '1.0.0'
    ]
];
