<?php

return [
    'blocks' => [
        [
            'name' => 'banner',
            'title' => __('Banner', TEXT_DOMAIN),
            'description' => __('A banner for use as a hero, cta, full width image or before the footer. Can have a swoosh effect', TEXT_DOMAIN),
            'category' => 'media',
            'icon' => 'cover-image',
            'mode' => 'preview',
            'keywords' => [ 'header', 'hero', 'callout' ],
            'align' => 'full',
            'align_text' => 'center',
            'align_content' => 'center',
            'supports' => [
                'align' => [ 'wide', 'full', 'center' ],
                'align_content' => false,
                'align_text' => true,
            ],
        ],
    ],
];
