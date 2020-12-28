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
        [
            'name' => 'focus-block',
            'title' => __('Focus Block', TEXT_DOMAIN),
            'description' => __('A block with a background, text and a CTA for highlighting key focuses', TEXT_DOMAIN),
            'category' => 'media',
            'icon' => 'welcome-view-site',
            'mode' => 'preview',
            'keywords' => [ 'callout', 'cta', 'feature' ],
            'align' => 'center',
            'align_text' => 'left',
            'align_content' => 'center',
            'supports' => [
                'align' => [ 'wide', 'full', 'center' ],
                'align_content' => false,
                'align_text' => false,
            ],
            'styles' => [
                [
                    'name' => 'Default',
                    'label' => __('Default', TEXT_DOMAIN),
                    'isDefault' => true,
                ],
                [
                    'name' => 'central',
                    'label' => __('Central', TEXT_DOMAIN),
                ],
            ]
        ],
    ],
];
