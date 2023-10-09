<?php

return [
    'server' => [
        'name' => 'Burning Legion',
        'version' => 'v7.3.5',
        'about' => [
            'expRate' => 1,
            'dropRate' => 1,

            'enableStatsGadget' => true,
        ],
    ],

    'realms' => [
        [
            'id' => 1,
            'name' => 'Ithilla',
            'build' => '26365',
            'address' => 'burninglegion.wow'
        ],
        [
            'id' => 2,
            'name' => 'IthillaTest',
            'build' => '26365',
            'address' => 'burninglegion.wow:3420'
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
