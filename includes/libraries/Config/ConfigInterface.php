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

/**
 * Interface ConfigInterface.
 *
 * Config data abstraction that can be used to inject arbitrary Config values
 * into other classes.
 *
 * @package AlainSchlesser\BetterSettings1
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
interface ConfigInterface
{

    /**
     * Check whether the Config has a specific key.
     *
     * @param string $key The key to check the existence for.
     *
     * @return bool Whether the specified key exists.
     */
    public function has_key(string $key): bool;

    /**
     * Get the value of a specific key.
     *
     * @param string $key The key to get the value for.
     *
     * @return mixed Value of the requested key.
     */
    public function get_key(string $key);

    /**
     * Get an array with all the keys.
     *
     * @return array Array of config keys.
     */
    public function get_keys(): array;
}
