<?php

return [
    'register-nav-menus' => [
        'header_menu' => 'Primary Menu',
        'footer_menu' => 'Footer Menu',
        'footer_column1' => 'Footer Column 1',
        'footer_column2' => 'Footer Column 2',
        'footer_column3' => 'Footer Column 3',
        'footer_column4' => 'Footer Column 4',
        'footer_column5' => 'Footer Column 5'
    ],
    'footer-widgets' => [
        [
            'name' => 'About',
            'theme_location' => 'footer_column1',
        ],
        [
            'name' => 'Get Involved',
            'theme_location' => 'footer_column2',
        ],
        [
            'name' => 'About Mercury',
            'theme_location' => 'footer_column3',
        ],
        [
            'name' => 'My Mercury',
            'theme_location' => 'footer_column4',
        ],
        [
            'name' => 'Legal',
            'theme_location' => 'footer_column5',
        ],
    ],
];
