<?php

use Features\AcfGutenbergBlocks\Constants\BlockSwoosh;
use Features\AcfGutenbergBlocks\Constants\Gutenberg;

if (empty($block)) {
    return;
}

$bg_image_url = get_field('bg_image')['url'];

$block_class = [esc_attr($block['class-name']), 'c-swoosh', 'u-bg-cover', 'u-bg-no-repeat'];
$block_class[] =
    $block['align_text'] === Gutenberg::ALIGN_CENTER ? 'u-text-center'
        : ($block['align_text'] === Gutenberg::ALIGN_RIGHT ? 'u-text-right'
        : 'u-text-left');

$text_area_class = ['u-max-w-lg', 'u-text-white'];
$text_area_class[] =
    $block['align_text'] === Gutenberg::ALIGN_CENTER ? 'u-mx-auto'
        : ($block['align_text'] === Gutenberg::ALIGN_RIGHT ? 'u-ml-auto'
        : '');

$title_tag = get_field('title_tag');
$title_text_stroke = get_field('title_text_stroke');
$title_stroke_color = get_field('title_stroke_color');
$title_text_filled = get_field('title_text_filled');
$title_fill_color = get_field('title_fill_color');
$title_text_size = get_field('title_text_size');

$swoosh_orientation = get_field('swoosh_mask');

$title_html = '<' . esc_html($title_tag) . '>'
    . '<span class="u-text-' . esc_attr($title_text_size) . ' u-block u-leading-none is-style-stroke" style="-webkit-text-stroke-color: ' . esc_attr($title_stroke_color) . '">' . $title_text_stroke . '</span>'
    . '<span class="u-text-' . esc_attr($title_text_size) . ' u-block u-leading-none" style="color: ' . esc_attr($title_fill_color) . '">' . $title_text_filled . '</span>'
    . '</' . esc_html($title_tag) . '>';

$text_area_html = '<div class="' . esc_attr(implode(' ', $text_area_class)) . '">' . get_field('content_text_area') . '</div>';

$top_swoosh_html = '<svg class="c-swoosh__overlay c-swoosh__overlay--top" style="transform: rotate(180deg); transform-origin: 50% 50%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 198"><g><g><path fill="#faf7f2" d="M1041.6,159.43c84.06-16.58,167.49-39.86,246.4-66.45s152-59.26,152-59.26V29.13s-77,31.21-155.91,57.28c-80.77,26.69-162.15,47.19-245.62,63.37-83.39,16.45,32.81-9.16,139-40.92C1268.21,81.49,1356.22,51.23,1440,11V0c-88.47,40.45-165.64,67.69-267.12,97.91-105.37,31.38-223,59.56-321.72,71.86-93.16,11.6-210.46,15.39-311.83,8.11-163.42-13.21-315.71-43-475.57-97.12,26,7.87,52.17,15.39,78.61,22.14a1850.37,1850.37,0,0,0,252.89,45.62l64.27,5.93L524,158.34l64.56,1.41q32.28-.21,64.52-.81-32.23-1.32-64.4-2.3l-64.21-4-64-5.53-63.68-7.49Q333,131,269.92,119.08a1713.39,1713.39,0,0,0,206.64,18.66c24,.5,48.09.6,72.13.9l72-1.52,71.86-4.18q35.85-3,71.6-6.34-36,1.47-71.82,3.28l-71.85,1.57-71.78-.12c-23.91-.84-47.81-1.46-71.69-2.48C381.64,123.92,268.73,111.2,193.9,92S49.84,51.4,0,29.72V200H1440V58.2c-152.79,58.05-315.12,95.92-482,115.48Q1000,167.46,1041.6,159.43Z"/></g></g></svg>';
$bottom_swoosh_html = '<svg class="c-swoosh__overlay c-swoosh__overlay--bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200"><g><g><path fill="#faf7f2" d="M1041.6,159.43c84.06-16.58,167.49-39.86,246.4-66.45s152-59.26,152-59.26V29.13s-77,31.21-155.91,57.28c-80.77,26.69-162.15,47.19-245.62,63.37-83.39,16.45,32.81-9.16,139-40.92C1268.21,81.49,1356.22,51.23,1440,11V0c-88.47,40.45-165.64,67.69-267.12,97.91-105.37,31.38-223,59.56-321.72,71.86-93.16,11.6-210.46,15.39-311.83,8.11-163.42-13.21-315.71-43-475.57-97.12,26,7.87,52.17,15.39,78.61,22.14a1850.37,1850.37,0,0,0,252.89,45.62l64.27,5.93L524,158.34l64.56,1.41q32.28-.21,64.52-.81-32.23-1.32-64.4-2.3l-64.21-4-64-5.53-63.68-7.49Q333,131,269.92,119.08a1713.39,1713.39,0,0,0,206.64,18.66c24,.5,48.09.6,72.13.9l72-1.52,71.86-4.18q35.85-3,71.6-6.34-36,1.47-71.82,3.28l-71.85,1.57-71.78-.12c-23.91-.84-47.81-1.46-71.69-2.48C381.64,123.92,268.73,111.2,193.9,92S49.84,51.4,0,29.72V200H1440V58.2c-152.79,58.05-315.12,95.92-482,115.48Q1000,167.46,1041.6,159.43Z"/></g></g></svg>';

?>

<section
    id="<?= esc_attr($block['html-id']) ?>"
    class="<?= esc_attr(implode(' ', $block_class)) ?>"
    style="background-image:url(<?= esc_url($bg_image_url) ?>)"
>
    <div class="o-wrapper">
        <?= $title_html ?>
        <div class="u-mb-2"></div>
        <?= $text_area_html ?>
        <div class="u-mb-8"></div>
        <?php include __DIR__ . '/../modules/buttons.php'; ?>
    </div>
    <?= $swoosh_orientation === BlockSwoosh::SWOOSH_TOP || $swoosh_orientation === BlockSwoosh::SWOOSH_BOTH ? $top_swoosh_html : '' ?>
    <?= $swoosh_orientation === BlockSwoosh::SWOOSH_BOTTOM || $swoosh_orientation === BlockSwoosh::SWOOSH_BOTH ? $bottom_swoosh_html : '' ?>
</section>
