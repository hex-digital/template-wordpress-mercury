<?php

$bl_manifest = null;

function manifest_uri(string $nameInManifest = null, string $bundle = null)
{
    return manifest($nameInManifest, $bundle, true);
}

function manifest_path(string $nameInManifest = null, string $bundle = null)
{
    return manifest($nameInManifest, $bundle, false);
}

function manifest_relative_path(string $nameInManifest = null, string $bundle = null)
{
    return manifest($nameInManifest, $bundle, false, true);
}

function manifest(string $nameInManifest = null, string $bundle = null, $uri = true, $relative = false)
{
    global $bl_manifest;

    if (! $bl_manifest) {
        $bl_manifest = new Features\AssetManifest\Manifest(
            \get_build_directory_path() .  \config('app')['manifest_build_path'],
            \config('app')['manifest_main_bundle'],
            \config('app')['relative_build_dir']
        );
    }

    if ($nameInManifest) {
        if ($uri) {
            return $bl_manifest->asset_uri($nameInManifest, $bundle);
        } else {
            if ($relative) {
                return $bl_manifest->asset_relative_path($nameInManifest, $bundle);
            }
            return $bl_manifest->asset_path($nameInManifest, $bundle);
        }
    }

    return $bl_manifest;
}
