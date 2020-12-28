<?php

/**
 * @see https://www.alainschlesser.com/config-files-for-reusable-code/
 *
 * @package   AlainSchlesser\BetterSettings1
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.alainschlesser.com/
 * @copyright 2016 Alain Schlesser
 */

namespace Lib\Config;

use ArrayObject;
use Exception;
use RuntimeException;

/**
 * Class Config.
 *
 * This Config class allows can be used to abstract away the
 * loading of a PHP array from a file.
 *
 * @package AlainSchlesser\BetterSettings1
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class Config extends ArrayObject implements ConfigInterface
{

    /**
     * Instantiate the Config object.
     *
     * @param array|string $config Array with settings or path to Config file.
     */
    public function __construct($config)
    {
        // If a string was passed to the constructor, assume it is the path to
        // a PHP Config file.
        if (is_string($config)) {
            $config = self::load_uri($config) ?: [];
        }

        // Make sure the config entries can be accessed as properties.
        parent::__construct($config, ArrayObject::ARRAY_AS_PROPS);
    }

    /**
     * Check whether the Config has a specific key.
     *
     * @param string $key The key to check the existence for.
     *
     * @return bool Whether the specified key exists.
     */
    public function has_key(string $key): bool
    {
        return array_key_exists($key, (array) $this);
    }

    /**
     * Get the value of a specific key.
     *
     * @param string $key The key to get the value for.
     *
     * @return mixed Value of the requested key.
     */
    public function get_key(string $key)
    {
        return $this[ $key ];
    }

    /**
     * Get an array with all the keys.
     *
     * @return array Array of config keys.
     */
    public function get_keys(): array
    {
        return array_keys((array) $this);
    }

    /**
     * Load the contents of a resource identified by an URI.
     *
     * @param string $uri URI of the resource.
     *
     * @return array|null Raw data loaded from the resource. Null if no data
     *                    found.
     * @throws RuntimeException If the resource could not be loaded.
     */
    public static function load_uri($uri)
    {
        try {
            // Try to load the file through PHP's include().
            // Make sure we don't accidentally create output.
            ob_start();
            $data = include $uri;
            ob_end_clean();
            return (array) $data;
        } catch (Exception $exception) {
            throw new RuntimeException(
                sprintf(
                    'Could not include PHP config file "%1$s". Reason: "%2$s".',
                    $uri,
                    $exception->getMessage()
                ),
                $exception->getCode(),
                $exception
            );
        }
    }
}
