<?php

/**
 * From a WordPress image ID, create an <img> tag with an alt, title, src, srcset, sizes attribute.
 *
 * Use the args parameter to customise further settings:
 *   class (string) - Add classes to the <img> tag.
 *   decorative (boolean) - Declare it as decorative to add an empty alt attribute.
 *   show_caption (boolean) - If true, add this image inside a <figure> and show a caption inside a <figcaption>.
 *   caption_class (string) - Add classes to the <figcaption> tag.
 *   caption (string) - If set, will use the string as the images caption.
 *                      If null, will fallback to the caption defined on the image in WordPress.
 *                      No effect if show_caption is false.
 *
 * Works well in conjunction with ACF and its Image type.
 */

if (!function_exists('acf_image_from_id')) {
    function acf_image_from_id($id, $size = 'large', $args = []): string
    {
        $default_args = [
            'class' => '',
            'decorative' => false,
            'show_caption' => false,
            'caption_class' => '',
            'caption' => null,
        ];
        $args = array_merge($default_args, $args);

        /**
         * @var string $class
         * @var boolean $decorative
         * @var boolean $show_caption
         * @var string $caption_class
         * @var string $caption
         */
        extract($args);

        $src = wp_get_attachment_image_src($id, $size);
        $srcset = wp_get_attachment_image_srcset($id, $size);
        $srcset_sizes = wp_get_attachment_image_sizes($id, $size);
        $alt_text = $decorative ? '' : get_post_meta($id, '_wp_attachment_image_alt', true);
        $title = get_the_title($id);
        $caption ??= get_the_excerpt($id);
        // $meta = wp_get_attachment_metadata( $id );

        if (!$id) {
            return '';
        }

        ob_start();
        ?>

        <?php if ($show_caption && $caption) : ?>
            <figure class="acf-caption wp-caption">
        <?php endif ?>

        <img class="<?= $class ?>"
             src="<?= esc_url($src[0]) ?>"
             title="<?= esc_attr($title) ?>"
             srcset="<?= esc_attr($srcset) ?>"
             sizes="<?= esc_attr($srcset_sizes) ?>"
             alt="<?= $alt_text ?>"
        />

        <?php if ($show_caption && $caption) : ?>
            <figcaption class="acf-caption-text wp-caption-text <?= $caption_class ?>"><?= $caption ?></figcaption>
            </figure>
        <?php endif ?>

        <?php
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }
}

/**
 * From a WordPress image ID, create an <img> tag with an alt, title, src, srcset, sizes attribute.
 * This function will automatically declare the img as decorative.
 * It will add relevant classes for using the image within a position: absolute container, as a background image.
 *
 * For parameter information, please see docblock for function acf_image_from_id.
 */
if (!function_exists('acf_background_image_from_id')) {
    function acf_background_image_from_id($id, $args = []): string
    {
        $default_args = [
            'class' => '',
            'decorative' => true,
            'show_caption' => false,
            'caption_class' => '',
            'caption' => null,
        ];
        $args = array_merge($default_args, $args);
        $args['class'] .= ' u-object-cover u-w-full u-h-full';
        return acf_image_from_id($id, 'large', $args);
    }
}

/**
 * From an acf oEmbed object and a set of options, add those options to the embed URL.
 */
if (!function_exists('acf_oembed_with_options')) {
    function acf_oembed_with_options(?string $oembed = '', array $args = []): string
    {
        if (!$oembed) {
            return '';
        }

        // Use preg_match to find iframe src.
        preg_match('/src="(.+?)"/', $oembed, $matches);
        $src = $matches[1];

        // Add extra parameters to src and replace HTML.
        $new_src = add_query_arg($args, $src);
        $iframe = str_replace($src, $new_src, $oembed);

        // Add extra attributes to iframe HTML.
        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

        // Display customized HTML.
        return $iframe;
    }
}

/**
 * An background options to an ACF oEmbed, plus others.
 */
if (!function_exists('acf_oembed_background_with_options')) {
    function acf_oembed_background_with_options(?string $oembed = '', array $args = []): string
    {
        $merged_args = array_merge([
            'controls' => 0,
            'autohide' => 1,
            'autoplay' => 1,
            'background' => 1,
            'hd' => 1,
            'muted' => 1,
        ], $args);

        return acf_oembed_with_options($oembed, $merged_args);
    }
}
