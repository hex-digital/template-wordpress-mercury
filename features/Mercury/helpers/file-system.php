<?php

if (! function_exists('get_build_uri')) {
    /**
     * Gets the build URI for a particular file.
     *
     * @param string $uri The URI of the file (relative to the theme).
     *
     * @return string      The full build path of the URI entered (with query
     *                     strings prepended if necessary)
     */
    function get_build_uri(string $uri): string
    {
        $uri = ltrim($uri, '/');

        return get_build_directory_uri() . '/' . $uri;
    }
}

if (! function_exists('get_build_directory_uri')) {
    /**
     * Returns the general build directory URI.
     *
     * This will usually be the relative `/dist` directory from the theme but, if
     * we're in production and a CDN constant is defined in the `wp-config.php` file
     * such as:
     *
     *     define( 'WP_CDN', 'https://a1b2c3d4e5f6g7.cloudfront.net/dist' );
     *
     * then this will be returned instead.
     *
     * @return string The build directory
     */
    function get_build_directory_uri(): string
    {
        if (uses_cdn()) {
            return WP_CDN;
        }

        return get_stylesheet_directory_uri() . \config('file-system')['build_dir'];
    }
}

if (! function_exists('get_build_directory_path')) {
    /**
     * Returns the general build directory path on the file system.
     *
     * This will usually be the relative `/dist` directory from the theme but, if
     * we're in production and a CDN constant is defined in the `wp-config.php` file
     * such as:
     *
     *     define( 'WP_CDN', 'https://a1b2c3d4e5f6g7.cloudfront.net/dist' );
     *
     * then this will be returned instead.
     *
     * @return string The path to the build directory on the file system, or the URL if via a CDN.
     */
    function get_build_directory_path(): string
    {
        if (uses_cdn()) {
            return WP_CDN;
        }

        return get_stylesheet_directory() . \config('file-system')['build_dir'];
    }
}

if (! function_exists('get_partials_directory')) {
    /**
     * Returns the absolute directory for partials for the theme.
     *
     * @return string The directory for all partials
     */
    function get_partials_directory(): string
    {
        return get_stylesheet_directory() . \config('file-system')['partials_dir'];
    }
}

if (! function_exists('get_flexible_content_directory')) {
    /**
     * Returns the absolute directory for flexible content for the theme.
     *
     * @return string The directory for all flexible content
     */
    function get_flexible_content_directory(): string
    {
        return get_stylesheet_directory() . \config('file-system')['flexible_dir'];
    }
}

if (! function_exists('get_flexible_content_template')) {
    /**
     * Gets the flexible content template URI.
     *
     * This is used to return a valid URI of the template when looping through the
     * flexible content blocks and returns the correctly named template. It should
     * be used in any template (usually the `page.php` file which is used to display
     * the flexible content blocks.
     *
     * Here is a code example of what the usage of this function would look like in
     * a template file:
     *
     *     while ( have_posts() ) : the_post();
     *         if ( have_rows( 'flexible_content' ) ) :
     *             while ( have_rows( 'flexible_content' ) ) : the_row();
     *                 $layout = get_flexible_content_template_uri( get_row_layout() );
     *                 if ( file_exists( $layout ) ) include $layout;
     *             endwhile;
     *         endif;
     *     endwhile;
     *
     * @param string $template The name of the template.
     *
     * @return string           The absolute path of the template
     */
    function get_flexible_content_template(string $template): string
    {
        $template = str_replace('_', '-', $template);
        return get_flexible_content_directory() . '/' . $template . '.php';
    }
}
