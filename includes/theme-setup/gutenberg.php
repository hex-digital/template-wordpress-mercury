<?php

add_action('after_setup_theme', function () {
    add_theme_support('editor-styles');
    add_editor_style(manifest_relative_path('css', 'gutenberg'));
}, 11);

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('mercury-gutenberg-js', manifest_uri('js', 'gutenberg'), ['wp-editor', 'wp-blocks', 'wp-dom', 'wp-edit-post'], true);
}, 100);
