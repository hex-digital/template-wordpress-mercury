<?php

use Env\Env;

if (! function_exists('get_environment')) {
    /**
     * Gets the environment from the APP_ENV variable. This variable can either be
     * set in the Apache httpd.conf file or the .htaccess file in the form of:
     *
     *     SetEnv APP_ENV production
     *
     * If not already set in Apache, it can instead be set in wp-config.php as:
     *
     *     define( 'APP_ENV', 'production' );
     *
     * If no environment variable is defined, this function will always assume a
     * production environment.
     *
     * @return string The name of the current environment
     */
    function get_environment()
    {
        $env = Env::get('APP_ENV');
        if ($env) {
            return $env;
        }

        if (defined('APP_ENV') && APP_ENV) {
            return APP_ENV;
        }

        return 'production';
    }
}

if (! function_exists('is_development')) {
    /**
     * Returns true if the current environment is development, and false if not.
     *
     * @return boolean Whether we're in a development environment
     */
    function is_development()
    {
        return ('development' === get_environment());
    }
}

if (! function_exists('is_staging')) {
    /**
     * Returns true if the current environment is staging, and false if not.
     *
     * @return boolean Whether we're in a staging environment
     */
    function is_staging()
    {
        return ('staging' === get_environment());
    }
}

if (! function_exists('is_production')) {
    /**
     * Returns true if the current environment is production, and false if not.
     * This method is best used in an if statement around production only scripts
     * such as Google Analytics or Google Tag Manager tracking code.
     *
     * @return boolean Whether we're in a production environment
     */
    function is_production()
    {
        return !is_development() && !is_staging();
    }
}

if (! function_exists('uses_cdn')) {
    /**
     * Returns true if the current environment uses a CDN for assets.
     * This is not true if the site uses CloudFlare, as the original assets are still available on the same file system
     * as WordPress. This is only true if assets are on a separate file system and must be requested over HTTP.
     *
     * @return boolean Whether we're using a CDN
     */
    function uses_cdn()
    {
        return 'production' === get_environment() && defined('WP_CDN');
    }
}
