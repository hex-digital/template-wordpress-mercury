<?php

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('MERCURY_VERSION', '1.0.0');
define('TEXT_DOMAIN', 'mercury');

$features = [
    'Mercury',
    'AssetManifest',
    'GutenbergAcfSetup',
    'AcfGutenbergBlocks',
    'FooterMenus',
    'CmsBranding',
    'AccessibilityDebug'
];

foreach ($features as $feature) {
     require 'features/' . $feature . '/start.php';
}

require __DIR__ . '/includes/theme-setup.php';
