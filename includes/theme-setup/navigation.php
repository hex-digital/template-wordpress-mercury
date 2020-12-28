<?php

add_action('init', 'register_menus');
function register_menus()
{
    $nav_menus = \config('nav-menus')['register_nav_menus'];
    if ($nav_menus) {
        register_nav_menus($nav_menus);
    }
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
// add additional classes to wp_nav_menu's output
function add_additional_class_on_li($classes, $item, $args)
{
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }

    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
function add_menu_link_class($attributes, $item, $arguments)
{
    if (property_exists($arguments, 'link_class')) {
        $attributes['class'] = $arguments->link_class;
    }
    return $attributes;
}
