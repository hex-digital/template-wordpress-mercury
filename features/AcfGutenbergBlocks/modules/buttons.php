<?php

use Features\AcfGutenbergBlocks\Constants\Gutenberg;
use Features\AcfGutenbergBlocks\Constants\ModuleButtons;

// Sometimes the field will have a different name. If so, just set $buttons_data before including this partial, then unset it afterwards
$buttons = $buttons_data ?: get_field('buttons')['buttons'] ?? [];

$block['align_text'] = $block['align_text'] ?? 'left';

$cluster_container_class =
    $block['align_text'] === Gutenberg::ALIGN_CENTER ? 'u-justify-center'
        : ($block['align_text'] === Gutenberg::ALIGN_RIGHT ? 'u-justify-end'
        : '');

$button_types = [
    ModuleButtons::TYPE_SOLID => 'block',
    ModuleButtons::TYPE_LINE => 'line',
];

if (! function_exists('getContrastColor')) {
    /**
     * This function is temporary until ACF is synced with the available colour from Gutenberg, and those hex colour codes
     * are synced with the variable names in SCSS.
     *
     * @TODO(jamie@hexdigital.com): Sync ACF colours with Gutenberg, then replace this function with a colour map for
     * white/black based on the color theme selected.
     */
    function getContrastColor($hexcolor)
    {
        if (!$hexcolor) {
            return '#fff';
        }

        $r = hexdec(substr($hexcolor, 1, 2));
        $g = hexdec(substr($hexcolor, 3, 2));
        $b = hexdec(substr($hexcolor, 5, 2));
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
        return ($yiq >= 128) ? '#333' : '#fff';
    }
}
?>

<div class="o-cluster">
    <div class="<?= $cluster_container_class ?>">
        <?php foreach ($buttons as $button) : ?>
            <?php $link = $button['link']; ?>
            <?php $type = $button['type']; ?>
            <?php $color_theme = $button['color_theme']; ?>
            <?php $bg = $type === ModuleButtons::TYPE_SOLID ? ' background-color: ' . $color_theme . ';' : ''; ?>
            <?php $color = getContrastColor($bg === '' ? '#000000' : $color_theme); ?>
            <a class="c-btn c-btn--<?= $button_types[$type] ?>" type="button" style="color: <?= $color ?>;<?= $bg ?>">
                <?= $link['title'] ?>
            </a>
        <?php endforeach ?>
    </div>
</div>
