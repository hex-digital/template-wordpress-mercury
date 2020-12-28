<?php

namespace Features\AssetManifest;

class Manifest
{
    protected object $manifest;
    protected string $default_bundle;
    protected string $relative_build_dir;

    public function __construct(string $path, string $default_bundle, string $relative_build_dir)
    {
        global $bl_curlContextOptions;

        $this->manifest = \json_decode(\file_get_contents($path)); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

        $this->default_bundle = $default_bundle;
        $this->relative_build_dir = $relative_build_dir;
    }

    /**
     * Gets the build URI for a particular file.
     *
     * @param string      $nameInManifest The name of the file in the asset manifest.
     * @param string|null $bundle         The name of the bundle this file exists in.
     *
     * @return string      The full build path of the URI entered (with query
     *                     strings prepended if necessary)
     */
    public function asset_uri(string $nameInManifest, string $bundle = null): string
    {
        if (!$bundle) {
            $bundle = $this->default_bundle;
        }

        return \get_build_uri($this->manifest->$bundle->$nameInManifest);
    }

    /**
     * Gets the build URI for a particular file.
     *
     * @param string      $nameInManifest The name of the file in the asset manifest.
     * @param string|null $bundle         The name of the bundle this file exists in.
     *
     * @return string      The full build path of the file entered
     */
    public function asset_path(string $nameInManifest, string $bundle = null): string
    {
        if (!$bundle) {
            $bundle = $this->default_bundle;
        }

        return \get_build_directory_path() . $this->manifest->$bundle->$nameInManifest;
    }

    /**
     * Gets the relative build URI for a particular file from the theme root.
     *
     * @param string      $nameInManifest The name of the file in the asset manifest.
     * @param string|null $bundle         The name of the bundle this file exists in.
     *
     * @return string      The relative build path of the file entered from the theme root.
     */
    public function asset_relative_path(string $nameInManifest, string $bundle = null): string
    {
        if (!$bundle) {
            $bundle = $this->default_bundle;
        }

        return $this->relative_build_dir . $this->manifest->$bundle->$nameInManifest;
    }
}
