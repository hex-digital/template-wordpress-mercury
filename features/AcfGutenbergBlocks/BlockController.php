<?php

namespace Features\AcfGutenbergBlocks;

use Lib\Config\Config as Config;

class BlockController
{
    private Config $config;
    private array $blocks;

    public function __construct(Config $config)
    {
        $this->config = $config;
        if ($this->config['acf']['blocks']) {
            $this->blocks = $this->config['acf']['blocks'] ?? [];
        }

        foreach ($this->blocks as $block) {
            new Block($block);
        }
    }
}
