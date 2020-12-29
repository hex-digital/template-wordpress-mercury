<?php

use Features\AcfGutenbergBlocks\Constants\Gutenberg;
use Features\AcfGutenbergBlocks\Constants\ImageAspectRatio;
use Features\AcfGutenbergBlocks\Constants\ImageRadius;

if (empty($block)) {
    return;
}

$content = get_field('content');
$max_columns = get_field('max_columns');
$image_corner_radius = get_field('image_corner_radius');
$image_aspect_ratio = get_field('image_aspect_ratio');

$block_class = [esc_attr($block['class-name']), 'acf-compact-grid--' . esc_attr($max_columns) . '-column'];

$block_class[] =
    $block['align_text'] === Gutenberg::ALIGN_CENTER ? 'u-text-center'
        : ($block['align_text'] === Gutenberg::ALIGN_RIGHT ? 'u-text-right'
        : 'u-text-left');

$rounded_class =
    $image_corner_radius === ImageRadius::RADIUS_CIRCLE ? 'u-rounded-full'
        : ($image_corner_radius === ImageRadius::RADIUS_ROUNDED ? 'u-rounded'
        : '');

$aspect_ratio_class =
    $image_aspect_ratio === ImageAspectRatio::ASPECT_RECTANGLE ? 'o-frame o-frame--16:9'
        : ($image_aspect_ratio === ImageAspectRatio::ASPECT_SQUARE ? 'o-frame o-frame--square'
        : '');

?>

<div class="<?= esc_attr(implode(' ', $block_class)) ?>">
    <?php foreach ($content as $field) : ?>
        <div>
            <?php if (!empty($field['image'])) : ?>
                <div class="acf-compact-grid__image">
                    <div class="<?= $aspect_ratio_class ?>">
                        <img class="<?= $rounded_class ?>" src="<?= $field['image']['sizes']['medium_large'] ?>"
                             alt="<?= $field['image']['alt'] ?>">
                    </div>
                </div>
            <?php endif ?>
            <div class="acf-compact-grid__text u-text-caption">
                <?php if (!empty($field['title'])) : ?>
                    <div class="u-font-semibold"><?= $field['title'] ?></div>
                <?php endif ?>
                <?php if (!empty($field['subtitle'])) : ?>
                    <div><?= $field['subtitle'] ?></div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
