<?php
/* Template Name: Styleguide */

$black_white = [
    'black' => [
        'name' => 'Black',
        'hex' => '000000',
        'bg' => 'u-bg-black',
    ],
    'white' => [
        'name' => 'White',
        'hex' => 'ffffff',
        'bg' => 'u-bg-white',
    ],
];

$grey = [
    'grey-200' => [
        'name' => '200',
        'hex' => '333',
        'bg' => 'bg-grey-200',
    ],
    'grey-300' => [
        'name' => '300',
        'hex' => '828282',
        'bg' => 'u-bg-grey-300',
    ],
    'grey-400' => [
        'name' => '400',
        'hex' => 'bdbdbd',
        'bg' => 'u-bg-grey-400',
    ],
    'grey-500' => [
        'name' => '500',
        'hex' => 'e5e2de',
        'bg' => 'u-bg-grey-500',
    ],
    'grey-600' => [
        'name' => '600',
        'hex' => 'f1eee8',
        'bg' => 'u-bg-grey-600',
    ],
    'grey-700' => [
        'name' => '700',
        'hex' => 'f5f2ec',
        'bg' => 'u-bg-grey-700',
    ],
    'grey-800' => [
        'name' => '800',
        'hex' => 'faf7f2',
        'bg' => 'u-bg-grey-800',
    ],
];

$primary = [
    'blue-300' => [
        'name' => '300',
        'hex' => '2e6ba6',
        'bg' => 'u-bg-blue-300',
    ],
    'blue-500' => [
        'name' => '500',
        'hex' => '479ad6',
        'bg' => 'u-bg-blue-500',
    ],
    'blue-700' => [
        'name' => '700',
        'hex' => 'c1d3e5',
        'bg' => 'u-bg-blue-700',
    ],
];

$secondary = [
    'green-300' => [
        'name' => '300',
        'hex' => '6bab45',
        'bg' => 'u-bg-green-300',
    ],
    'green-500' => [
        'name' => '500',
        'hex' => 'a0dd83',
        'bg' => 'u-bg-green-500',
    ],
    'green-700' => [
        'name' => '700',
        'hex' => 'd3e6c8',
        'bg' => 'u-bg-green-700',
    ],
];

$highlights = [
    'green-lime' => [
        'name' => 'Green Lime',
        'hex' => 'd1f521',
        'bg' => 'u-bg-green-lime',
    ],
    'pink-ruby' => [
        'name' => 'Pink Ruby',
        'hex' => 'eb4a6e',
        'bg' => 'u-bg-pink-ruby',
    ],
    'blue-turquoise' => [
        'name' => 'Blue Turquoise',
        'hex' => '0fc9ff',
        'bg' => 'u-bg-blue-turquoise',
    ],
    'purple-amethyst' => [
        'name' => 'Purple Amethyst',
        'hex' => 'a35cde',
        'bg' => 'u-bg-purple-amethyst',
    ],
    'red-cinnabar' => [
        'name' => 'Red Cinnabar',
        'hex' => 'e53d3d',
        'bg' => 'u-bg-red-cinnabar',
    ],
    'green-shamrock' => [
        'name' => 'Green Shamrock',
        'hex' => '59de9e',
        'bg' => 'u-bg-green-shamrock',
    ],
    'pink-mauvelous' => [
        'name' => 'Pink Mauvelous',
        'hex' => 'f28ab2',
        'bg' => 'u-bg-pink-mauvelous',
    ],
    'blue-midnight' => [
        'name' => 'Blue Midnight',
        'hex' => '0f215e',
        'bg' => 'u-bg-blue-midnight',
    ],
    'orange-flamingo' => [
        'name' => 'Orange Flamingo',
        'hex' => 'f55c42',
        'bg' => 'u-bg-orange-flamingo',
    ],
    'orange-peach' => [
        'name' => 'Orange Peach',
        'hex' => 'ffa800',
        'bg' => 'u-bg-orange-peach',
    ],
    'blue-viking' => [
        'name' => 'Blue Viking',
        'hex' => '5cc2d1',
        'bg' => 'u-bg-blue-viking',
    ],
    'yellow-turbo' => [
        'name' => 'Yellow Turbo',
        'hex' => 'ffe300',
        'bg' => 'u-bg-yellow-turbo',
    ],
];

$swatches = [
    'Black &amp; White' => $black_white,
    'Greys' => $grey,
    'Primary' => $primary,
    'Secondary' => $secondary,
    'Highlights' => $highlights,
];

function colorSquare($color, $withBorder = false)
{
    $border = $withBorder ? ' u-border u-border-grey-400 ' : '';
    return '<div class="u-bg-' . $color . $border . ' u-m-5 u-rounded-lg u-h-20 u-w-20"></div>';
}

get_header() ?>

<section class="o-wrapper u-mb-40 c-page-template">
    <h1 class="u-font-title u-text-6xl md:u-text-9xl u-font-bold u-uppercase">Styleguide</h1>
    <div class="u-max-w-lg">
        <p>This styleguide displays our basic design elements, such as typography and colors. It also demonstrates a
            series of layout objects and how they can be used.</p>
        <p>Please inspect the source code to for classes or markup for use.</p>
    </div>
</section>

<section class="o-wrapper u-mb-20">
    <h2 class="u-font-title u-text-4xl md:u-text-8xl u-font-bold u-uppercase">Typography</h2>
    <div class="u-mb-20">
        <h3 class="u-text-heading-xl">
            Heading #1
        </h3>
        <h3 class="u-text-heading-lg">
            Heading #2
        </h3>
        <h3 class="u-text-heading-md">
            Heading #3
        </h3>
        <h3 class="u-text-heading-sm">
            Heading #4
        </h3>
        <h3 class="u-text-heading-lg is-style-stroke has-grey-200-color">
            Stroke Title
        </h3>
        <h3 class="u-text-heading-lg is-style-stroke has-pink-ruby-color">
            Stroke Title
        </h3>
    </div>

    <div>
        <p class="u-mb-10">
            <span class="u-text-body-lg u-font-semibold">Body XL Semibold</span><br/>
            <span class="u-text-body-lg u-font-medium">Body XL Medium</span>
        </p>
        <p class="u-mb-10">
            <span class="u-text-body-md u-font-semibold">Body large Semibold</span><br/>
            <span class="u-text-body-md u-font-medium">Body large Medium</span><br/>
            <span class="u-text-body-md">Body large link</span><br/>
            <span class="u-text-body-md">Body large Regular</span><br/>
        </p>
        <p class="u-mb-10">
            <span class="u-text-body u-font-semibold">Body Semibold</span><br/>
            <span class="u-text-body-md">Body large link</span><br/>
            <span class="u-text-body-md">Body large Regular</span><br/>
        </p>
        <p class="u-mb-10">
            <span class="u-text-caption u-font-semibold">Caption Semibold</span><br/>
            <span class="u-text-caption">Caption</span><br/>
        </p>
    </div>
</section>

<section class="o-wrapper u-flex u-flex-wrap u-mb-40">
    <h2 class="u-font-title u-text-4xl md:u-text-8xl u-font-bold u-uppercase">Colors</h2>
    <?php foreach ($swatches as $swatch_name => $colors) : ?>
        <div class="u-px-2 u-w-full u-relative"><h3 class="u-markdown u-no-toc u-mb-4 u-mt-8"><?= $swatch_name ?></h3>
            <div class="u--mx-2 u--mt-5 u-flex u-flex-wrap">
                <?php foreach ($colors as $color => $meta) : ?>
                    <div class="u-w-1/2 u-px-2 md:u-w-1/3">
                        <div class="u-flex u-items-center u-mt-5">
                            <div class="<?= $meta['bg'] ?> u-h-16 u-w-16 u-rounded-lg u-shadow-inner"></div>
                            <div class="u-ml-2 u-text-gray-800 u-text-xs u-leading-none pl-1">
                                <div class="u-font-semibold"><?= $meta['name'] ?></div>
                                <div class="u-mt-1 u-font-normal u-opacity-75">#<?= $meta['hex'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
</section>

<section>
    <div class="o-wrapper">
        <h2 class="u-font-title u-text-4xl md:u-text-8xl u-font-bold u-uppercase">Objects</h2>
        <h3 class="u-font-title u-text-3xl md:u-text-7xl u-font-bold u-uppercase">Wrapper</h3>
    </div>
    <div class="u-bg-orange-peach u-mb-10">
        <div class="o-wrapper u-bg-green-shamrock">
            <div class="u-bg-blue-turquoise">
                <p>The wrapper object has a max-width, and is automatically centered with a margin left/right auto.</p><br/>
                <p>It has left/right padding to stop content from getting too close to the screen edges.</p><br/>
                <p>You can break out of a wrapper by using the o-wrapper__wide or o-wrapper__bleed class, which applies
                    negative margins to the element, as seen below.</p><br/>
                <div class="o-wrapper__wide u-bg-pink-mauvelous">This content is within a wrapper, but has the class
                    o-wrapper__wide, so it stretches out a bit further.</div>
                <div class="o-wrapper__bleed u-bg-purple-amethyst">This content is within a wrapper, but has the class
                    o-wrapper__bleed, so it breaks out to full screen.</div>
            </div>
        </div>
    </div>
    <div class="o-wrapper u-mb-10">
        <h3 class="u-font-title u-text-3xl md:u-text-7xl u-font-bold u-uppercase">Stack</h3>
        <div class="o-stack">
            <p>A stack is used to vertically space content. Rather than spacing individual elements, it spaces by context.</p>
            <p>It does this using a top margin, applied to every element except the first, and it does it using a series
                of context-based rules, such as p + p or p + img.</p>
            <p>This means we could add spacing rules that work for flow content.</p>
            <p>In the example below, we use a stack to evenly space content, as well as show an example of how a form
                with labels could utilise nested stacks of different sizes.</p>
            <p>Note that <span class="u-text-orange-peach">Orange</span> is the parent stack margin and
                <span class="u-text-pink-mauvelous">Pink</span> is the child stack margin.</p>
        </div>
    </div>
    <div class="o-wrapper u-mb-10">
        <div class="u-bg-orange-peach u-mb-10">
            <div class="o-stack">
                <p class="u-bg-grey-800">One element</p>
                <p class="u-bg-grey-800">Two element</p>
                <p class="u-bg-grey-800">Three element</p>
                <p class="u-bg-grey-800">Four</p>
                <div class="o-stack o-stack--10 u-bg-pink-mauvelous">
                    <div class="u-bg-grey-800">A stack within</div>
                    <div class="u-bg-grey-800">Another stack</div>
                    <div class="u-bg-grey-800">with bigger sizes</div>
                </div>
            </div>
        </div>
        <div class="u-bg-orange-peach">
            <div class="o-stack">
                <div class="o-stack o-stack--1 u-bg-pink-mauvelous">
                    <label class="u-bg-grey-800" for="field1">Form label</label>
                    <input class="u-bg-grey-800" id="field1" value="Form input">
                </div>
                <div class="o-stack o-stack--1 u-bg-pink-mauvelous">
                    <label class="u-bg-grey-800" for="field1">Form label</label>
                    <input class="u-bg-grey-800" id="field1" value="Form input">
                </div>
            </div>
        </div>
    </div>
    <div class="o-wrapper u-mb-10">
        <h3 class="u-font-title u-text-3xl md:u-text-7xl u-font-bold u-uppercase">Cluster</h3>
        <p>A cluster can group a series of elements together, such as buttons, while maintaining even spacing on all sides,
            even when wrapping.</p><br>
        <p>Note that a cluster must have a child element (in this case a div) on which it can apply a negative margin.
            That element then contains all the cluster items.</p><br>
        <div class="o-stack">
            <div class="o-cluster">
                <div>
                    <div>This is a Long Item 1</div>
                    <div>Short 2</div>
                    <div>Medium Item 3</div>
                    <div>Short 4</div>
                    <div>And this is a long Item 5</div>
                </div>
            </div>
            <div class="o-cluster">
                <ul>
                    <li>List Item 1</li>
                    <li>List Item 2</li>
                    <li>List Item 3</li>
                    <li>List Item 4</li>
                    <li>List Item 5</li>
                </ul>
            </div>
        </div>
</section>

<div class="o-wrapper u-py-5">
    <h1 class="u-font-title u-text-3xl md:u-text-7xl u-font-bold u-uppercase">Buttons</h1>
    <div class="u-max-w-lg">
        <p>
            Button showcase
        </p>
    </div>
    <!-- solid buttons -->
    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--block c-btn--black" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--green" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--blue" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--white" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--block c-btn--inverse" href="https://google.com">Button</a>
        </div>
    </div>

    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4"  class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--block c-btn--black c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--green c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--blue c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--block c-btn--white c-btn--md" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--block c-btn--inverse c-btn--md" href="https://google.com">Button</a>
        </div>
    </div>

    <!-- line buttons -->
    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--line c-btn--black" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--green" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--blue" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--white" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--line c-btn--inverse" href="https://google.com">Button</a>
        </div>
    </div>

    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--line c-btn--black c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--green c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--blue c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--line c-btn--white c-btn--md" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--line c-btn--inverse c-btn--md" href="https://google.com">Button</a>
        </div>
    </div>

    <!-- tertiary buttons -->
    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--tertiary c-btn--black" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--green" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--blue" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--white" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--tertiary c-btn--inverse" href="https://google.com">Button</a>
        </div>
    </div>

    <div class="u-my-6 u-grid u-grid-cols-5 u-gap-4">
        <div><a class="c-btn c-btn--tertiary c-btn--black c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--green c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--blue c-btn--md" href="https://google.com">Button</a></div>
        <div><a class="c-btn c-btn--tertiary c-btn--white c-btn--md" href="https://google.com">Button</a></div>
        <div class="u-bg-black u-p-4 u-inline-block">
            <a class="c-btn c-btn--tertiary c-btn--inverse c-btn--md" href="https://google.com">Button</a>
        </div>
    </div>
</div>




<?php get_footer(); ?>
