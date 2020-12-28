<?php

namespace Features\GutenbergAcfSetup;

class GutenbergController
{
    private array $gutenbergConfig;
    private array $acfConfig;

    public function __construct(array $gutenbergConfig = [], array $acfConfig = [])
    {
        $this->gutenbergConfig = $gutenbergConfig;
        $this->acfConfig = $acfConfig;

        add_action('after_setup_theme', [$this, 'gutenberg_support']);

        add_filter('body_class', [$this, 'blocks_body_classes']);
    }

    public function gutenberg_support()
    {
        mer_add_theme_support($this->gutenbergConfig['theme-supports']);

        // Adds support for editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            $this->gutenbergConfig['editor-font-sizes']
        );

        // Adds support for editor color palette.
        add_theme_support(
            'editor-color-palette',
            $this->gutenbergConfig['editor-color-palette']
        );
    }

    /**
     * Adds body classes to help with block styling.
     *
     * - `has-no-blocks` if content contains no blocks.
     * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
     * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
     */
    public function blocks_body_classes(array $classes): array
    {
        if (!is_singular() || !function_exists('has_blocks') || !function_exists('parse_blocks')) {
            return $classes;
        }

        if (!has_blocks()) {
            $classes[] = 'has-no-blocks';
            return $classes;
        }

        $post_object = get_post(get_the_ID());
        $blocks = (array)parse_blocks($post_object->post_content);

        if (isset($blocks[0]['blockName'])) {
            $classes[] = 'first-block-' . str_replace('/', '-', $blocks[0]['blockName']);
        }

        if (isset($blocks[0]['attrs']['align'])) {
            $classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
        }

        return $classes;
    }
}
