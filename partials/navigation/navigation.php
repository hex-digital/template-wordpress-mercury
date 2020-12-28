<nav class="c-navbar">
    <div class="c-navbar__wrapper o-wrapper">

        <div class="c-navbar__container">
            <div class="c-navbar__brand">
                <a href="<?= get_site_url() ?>" title="<?= get_bloginfo('name') ?>" aria-label="Home Page">
                    Mercury
                </a>
            </div>

            <?php if (has_nav_menu('header_menu')) : ?>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header_menu',
                    'container_class' => 'o-cluster c-navbar__links',
                    'menu_class' => 'c-navbar__link-list',
                    'list_item_class' => 'c-navbar__link-item',
                    'link_class' => 'c-navbar__link',
                ]);
                ?>
            <?php endif ?>

            <div class="u-ml-4">
                <div class="js-open-search">
                    <?php include get_partials_directory() . '/navigation/search.php' ?>
                </div>
            </div>

            <div class="u-ml-4">
                <?php // include get_partials_directory() . '/navigation/language-switcher.php' ?>
            </div>
        </div>
    </div>
</nav>

<div class="js-search-global-modal">
    <div class="js-search-global-modal__ribbon">
        <div class="o-wrapper u-flex u-flex-row u-items-center">
            <div class="js-search-global-modal__search-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <? // phpcs:ignore Generic.Files.LineLength.TooLong ?>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3461 10.423C17.3461 14.2465 14.2465 17.3461 10.423 17.3461C6.59955 17.3461 3.5 14.2465 3.5 10.423C3.5 6.59955 6.59955 3.5 10.423 3.5C14.2465 3.5 17.3461 6.59955 17.3461 10.423ZM15.986 17.4001C14.4605 18.618 12.5268 19.3461 10.423 19.3461C5.49498 19.3461 1.5 15.3511 1.5 10.423C1.5 5.49498 5.49498 1.5 10.423 1.5C15.3511 1.5 19.3461 5.49498 19.3461 10.423C19.3461 12.5267 18.618 14.4604 17.4002 15.9859L22.1529 20.7385L20.7386 22.1527L15.986 17.4001Z" fill="#FAF7F2"/>
                </svg>
            </div>

            <?php get_search_form() ?>

            <div class="js-search-global-modal__clear_text">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <? // phpcs:ignore Generic.Files.LineLength.TooLong ?>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99996 8.41417L12.2928 13.7071L13.7071 12.2928L8.41417 6.99995L13.7071 1.70706L12.2928 0.292847L6.99995 5.58574L1.70706 0.292847L0.292847 1.70706L5.58574 6.99995L0.292849 12.2928L1.70706 13.7071L6.99996 8.41417Z" fill="#FAF7F2"/>
                </svg>
                <span class="u-ml-3">Clear</span>
            </div>
        </div>
    </div>

    <div class="js-search-global-modal__cover">
        <div class="o-wrapper">
            <div class="u-border-t u-pt-5 u-mt-6 u-text-3xl">
                Press enter for results
            </div>
        </div>
    </div>


</div>
