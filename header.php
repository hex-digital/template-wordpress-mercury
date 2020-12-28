<!doctype html>
<html <?php language_attributes() ?>>
    <head>
        <!-- Required meta tags -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php bloginfo('name') ?> | <?php is_front_page() ? bloginfo('description') : wp_title('') ?></title>
        <?php wp_head() ?>
</head>

<body <?= body_class() ?>>
<a href="#skip-to--content" class="u-skip-link">Skip to Content</a>

<?php include get_partials_directory() . '/navigation/navigation.php' ?>

<main id="skip-to--content">
