<?php

use Lib\Config\Config as Config;

$bl_helper_config = null;

if (! function_exists('config')) {
    function config($key = null)
    {
        global $bl_helper_config;

        if (!$bl_helper_config) {
            $merged_config = [];

            $config_files = new DirectoryIterator(__DIR__ . '/../../../config');
            foreach ($config_files as $config_file) {
                if (!$config_file->isDot()) {
                    $filename = $config_file->getBasename('.' . $config_file->getExtension());
                    $merged_config[$filename] = Config::load_uri($config_file->getRealPath());
                }
            }

            $bl_helper_config = new Config($merged_config);
        }

        if ($key === null) {
            return $bl_helper_config;
        }

        return $bl_helper_config[$key] ?? [];
    }
}
