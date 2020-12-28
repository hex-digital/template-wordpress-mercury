<?php

$branding_config = \config('cms-branding');

if (!$branding_config['enable_branding']) {
    return;
}

add_action('login_enqueue_scripts', function () {
//    wp_enqueue_style('mercury/admin.css', get_stylesheet_directory_uri() . '/custom/assets/css/admin.css', null, null);
});

if (!isset($branding_config['header-url'])) {
    add_filter('login_headerurl', function () use ($branding_config) {
        return $branding_config['header-url'];
    });
}

if (!isset($branding_config['header-text'])) {
    add_filter('login_headertext', function () use ($branding_config) {
        return $branding_config['header-text'];
    });
}
