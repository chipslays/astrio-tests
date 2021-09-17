<?php

return [
    [
        'id' => 1,
        'title' => 'Категория 1',
        'children' => [],
    ],
    [
        'id' => 2,
        'title' => 'Категория 2',
        'children' => [
            [
                'id' => 3,
                'title' => 'Категория 3',
            ]
        ],
    ],
    [
        'id' => 4,
        'title' => 'Категория 4',
        'children' => [
            [
                'id' => 5,
                'title' => 'Категория 5',
                'children' => [
                    [
                        'id' => 6,
                        'title' => 'Категория 6',
                        'children' => [],
                    ],
                ],
            ]
        ],
    ],
    [
        'id' => 7,
        'title' => 'Категория 7',
        'children' => [
            [
                'id' => 8,
                'title' => 'Категория 8',
                'children' => [
                    [
                        'id' => 9,
                        'title' => 'Категория 9',
                        'children' =>  [
                            [
                                'id' => 10,
                                'title' => 'Категория 10',
                                'children' => [
                                    [
                                        'id' => 11,
                                        'title' => 'Категория 11',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ],
    ],
];
