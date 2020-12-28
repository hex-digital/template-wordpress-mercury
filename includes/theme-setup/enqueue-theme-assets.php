<?php

/**
 * Theme assets
 */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mercury-main-css', manifest_uri('css'), false, null);
    wp_enqueue_script('mercury-main-js', manifest_uri('js'), false, null, true);
}, 11);
