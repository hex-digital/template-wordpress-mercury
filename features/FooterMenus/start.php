<?php

if (! function_exists('register_footer_menus')) {
    function register_footer_menus()
    {
        $footer = \config('nav-menus');
        $column = 1;
        foreach ($footer['footer-widgets'] as $menus) {
            register_nav_menus(['footer_column-' . $column => 'Footer Column ' . $column]);
            $column++;
        }
    }
}

if (! function_exists('footer_display_all_columns')) {
    function footer_display_all_columns()
    {
        $footer = \config('footer-menus');

        $column = 1;
        foreach ($footer['footer-widgets'] as $menu) {
            if (has_nav_menu('footer_column' . $column)) {
                wp_nav_menu([
                    'items_wrap' => '<h3 class="c-footer__menu__header">' . $menu['name'] . '</h3><ul class="%2$s">%3$s</ul>',
                    'theme_location' => 'footer_column' . $column,
                    'container_class' => 'testing',
                    'menu_class' => 'c-footer__menu',
                    'list_item_class' => '',
                    'link_class' => 'c-footer__menu__link',
                ]);
            }
            $column++;
        }
    }
}
