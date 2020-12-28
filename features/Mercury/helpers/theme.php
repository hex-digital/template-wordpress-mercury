<?php

/**
 * Dont Update the Theme
 *
 * If there is a theme in the WordPress official repo with the same name as this theme, prevent WP from prompting an update.
 * This works by removing the theme from the list of available updates.
 */

add_filter('http_request_args', function ($response, $url) {
    if (0 === str_starts_with($url, 'https://api.wordpress.org/themes/update-check')) {
        $themes = json_decode($response['body']['themes']);
        unset($themes->themes->{get_option('template')});
        unset($themes->themes->{get_option('stylesheet')});
        $response['body']['themes'] = wp_json_encode($themes);
    }

    return $response;
}, 10, 2);

if (! function_exists('mer_add_theme_support')) {
    /**
     * Register theme supports from an array. Theme supports cannot be unregistered.
     * Supports can take a true or false value, or can be extra arguments to pass along with the support, such as an
     * array, string, boolean or integer.
     *
     * @param array $themeSupports
     */
    function mer_add_theme_support(array $themeSupports): void
    {
        foreach ($themeSupports as $support => $value) {
            if ($value === false) {
                continue;
            }

            if ($value === true) {
                add_theme_support($support);
            } else {
                add_theme_support($support, $value);
            }
        }
    }
}
