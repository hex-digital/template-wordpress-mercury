<?php

if (!is_development()) {
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_script('mercury-accessibilty-debug', get_build_directory_uri() . '/../node_modules/@khanacademy/tota11y/dist/tota11y.min.js', false, null);
    }, 11);
}
