<?php

$branding_config = \config('cms-branding');

if (!isset($branding_config) || !$branding_config['enable_branding']) {
    return;
}
$login_branding_config = $branding_config['login'];

if (!isset($login_branding_config)) {
    return;
}

if (isset($login_branding_config['stylesheet_url'])) {
    add_action('login_enqueue_scripts', function () use ($login_branding_config) {
        wp_enqueue_style('mercury/admin.css', $login_branding_config['stylesheet_url'], null, null);
    });
}

if (isset($login_branding_config['stylesheet_manifest_entry'])) {
    add_action('login_enqueue_scripts', function () use ($login_branding_config) {
        wp_enqueue_style('mercury/admin.css', \manifest(...$login_branding_config['stylesheet_manifest_entry']), null, null);
    });
}

if (isset($login_branding_config['header_url'])) {
    add_filter('login_headerurl', function () use ($login_branding_config) {
        return $login_branding_config['header_url'];
    });
}

if (isset($login_branding_config['header_text'])) {
    add_filter('login_headertext', function () use ($login_branding_config) {
        return $login_branding_config['header_text'];
    });
}
