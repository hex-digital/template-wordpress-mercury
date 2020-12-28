<?php

if (! function_exists('bl_add_theme_support')) {
    /**
     * Register theme supports from an array. Theme supports cannot be unregistered.
     * Supports can take a true or false value, or can be extra arguments to pass along with the support, such as an
     * array, string, boolean or integer.
     *
     * @param array $themeSupports
     */
    function bl_add_theme_support(array $themeSupports): void
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
