<?php

use Features\AcfGutenbergBlocks\Constants\FocusBlock;

if (empty($block)) {
    return;
}

if (!function_exists('background_image_style')) {
    function background_image_style($panel, $style): string
    {
        if (!$panel['background_image']['sizes']['large']) {
            return '';
        }

        $shim = $panel['background_shim'];

        if ($style === FocusBlock::STYLE_DEFAULT) {
            $from = '0';
            $to = $shim ? '0.9' : '0';
        } else {
            $from = '0.6';
            $to = $shim ? '0.9' : '0.6';
        }

        return
            'background-image:' .
            ' linear-gradient(rgba(51, 51, 51, ' . $from . '), rgba(51, 51, 51, ' . $to . ')),' .
            ' url(' . $panel['background_image']['sizes']['large'] . ')';
    }
}

if (!function_exists('focus_text_html')) {
    function focus_text_html($panel): string
    {
        $focus_text = $panel['focus_text'];
        $focus_text_color = $panel['focus_text_color'];
        $focus_text_class = $panel['focus_text_style'] === FocusBlock::TEXT_STYLE_FILL ? '' : 'is-style-stroke';

        $focus_text_style =
            $panel['focus_text_style'] === FocusBlock::TEXT_STYLE_FILL
                ? 'color: ' . esc_attr($focus_text_color)
                : '-webkit-text-stroke-color: ' . esc_attr($focus_text_color);

        return
            '<span' .
            ' class="u-text-heading-lg u-block u-leading-none ' . $focus_text_class . '"' .
            ' style="' . $focus_text_style . '"' .
            '>' . $focus_text . '</span>';
    }
}


$block_style = str_contains($block['class-name'], 'is-style-central') ? FocusBlock::STYLE_CENTRAL : FocusBlock::STYLE_DEFAULT;

$panels = get_field('panels');
$max_columns = get_field('max_columns');

$block_class = [esc_attr($block['class-name']), 'acf-focus-block--' . esc_attr($max_columns) . '-column'];

?>

<article class="<?= esc_attr(implode(' ', $block_class)) ?>">
    <?php foreach ($panels as $panel) : ?>
        <div class="acf-focus-panel" style="<?= background_image_style($panel, $block_style) ?>">
            <div class="u-mb-2">
                <?= focus_text_html($panel) ?>
            </div>
            <div class="acf-focus-panel__content">
                <div class="u-max-w--<?= $block_style === FocusBlock::STYLE_CENTRAL ? '4xl' : 'xl' ?>">
                    <h3 class="u-text-heading-sm u-text-grey-800 u-mb-2"><?= $panel['title'] ?></h3>
                    <span class="u-text-grey-800"><?= $panel['subtitle'] ?></span>
                </div>
                <div class="acf-focus-panel__buttons">
                    <?php $buttons_data = $panel['buttons'] ?>
                    <?php include __DIR__ . '/../modules/buttons.php'; ?>
                    <?php $buttons_data = null ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</article>
