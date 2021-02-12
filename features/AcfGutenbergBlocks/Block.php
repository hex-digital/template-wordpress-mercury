<?php

namespace Features\AcfGutenbergBlocks;

class Block
{
    private array $block_config;
    private string $render_directory = __DIR__ . '/blocks';

    public function __construct(array $block_config)
    {
        $this->block_config = $block_config;
        $this->block_config['render_callback'] = [ $this, 'render_block' ];
        add_action('acf/init', [ $this, 'register_block' ]);
    }

    /**
     * Register ACF Blocks for Gutenberg
     * See: https://www.advancedcustomfields.com/resources/acf_register_block_type/
     */
    public function register_block(): void
    {
        if (! function_exists('acf_register_block_type')) {
            return;
        }

        acf_register_block_type($this->block_config);
    }

    /**
     * Called to render the block when shown on the frontend, or previewed in the Gutennberg editor.
     * Any setup of data can be done here.
     * The $block parameter is passed through to the render template so it can be used there.
     *
     * @param array $block
     */
    public function render_block(array $block, $content = '', $is_preview = false, $post_id = 0): void
    {
        $block = $this->transform_block_name($block);
        $block_file_path = $this->get_block_template($block);

        $block = $this->create_block_meta($block);

        if (file_exists($block_file_path)) {
            include $block_file_path;
        } else {
            write_log('ACF Block not found: ' . $block_file_path);
        }
    }

    protected function transform_block_name(array $block): array
    {
        $block['name'] = str_replace('acf/', '', $block['name']);

        return $block;
    }

    /**
     * Block names are prepended with the string 'acf/'. This function removes that prefix.
     */
    protected function get_block_template(array $block): string
    {
        return $this->render_directory . '/' . $block['name'] . '.php';
    }

    protected function create_block_meta(array $block): array
    {
        // Create id attribute allowing for custom "anchor" value.
        $id = $block['name'] . '-' . $block['id'];
        if (! empty($block['anchor'])) {
            $id = $block['anchor'];
        }
        $block['html-id'] = $id;

        // Create class attribute allowing for custom "className" and "align" values.
        $class_name = 'acf-' . $block['name'];
        if (! empty($block['className'])) {
            $class_name .= ' ' . $block['className'];
        }
        if (! empty($block['align'])) {
            $class_name .= ' align' . $block['align'];
        }
        if (! empty($block['align_text'])) {
            $class_name .= ' align_text' . $block['align_text'];
        }
        if (! empty($block['align_content'])) {
            $class_name .= ' align_content' . $block['align_content'];
        }
        $block['class-name'] = $class_name;

        return $block;
    }
}
