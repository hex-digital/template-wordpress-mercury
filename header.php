<!doctype html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name') ?> | <?php is_front_page() ? bloginfo('description') : wp_title('|', true, 'right') ?></title>
    <?php wp_head() ?>
</head>

<body <?= body_class('u-sticky-footer') ?>>
<div> <?php // Open the sticky footer helper container. See _elements.pages.scss ?>
    <a href="#skip-to--content" class="c-skip-link">Skip to Content</a>

    <?php include get_partials_directory() . '/navigation/navigation.php' ?>

    <main id="skip-to--content">
