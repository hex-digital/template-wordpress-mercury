<?php
/*
Template Name: Search Template
*/
get_header();

$default_args = [
    'post_type' => ['page', 'post'],
    'ep_integrate' => true,
    's' => $_GET['s'],
    'posts_per_page' => 10,
    'paged' => 1,
];

$sections = [
    [
        'slug' => 'pages',
        'title' => 'Pages',
        'page' => $_GET['current_pages'] ?: 1,
        'query' => new WP_Query(array_merge($default_args, [
            'paged' => $_GET['current_pages'] ?: 1,
        ])),
        'cta' => 'Go to Page',
    ],
];

$total_results = 0;
foreach ($sections as $section) {
    $total_results += $section['query']->found_posts;
}

?>

<div class="o-wrapper c-page-template">
    <h2 class="u-text-body-lg u-font-semibold u-py-4 u-flex u-justify-between">
        <span>Results</span>
        <span><?= $total_results ?></span>
    </h2>

    <?php foreach ($sections as $section) : ?>
        <?php if ($section['query']->have_posts()) : ?>
            <section class="c-search-result" id="<?= $section['slug'] ?>">
                <div class="c-search-result__heading">
                    <h2 class="c-search-result__heading-title"><?= $section['title'] ?></h2>
                    <div class="c-search-result__found"><?= $section['query']->found_posts ?></div>
                </div>

                <div class="c-search-result__wrapper">
                    <div class="c-search-result__container">
                        <?php while ($section['query']->have_posts()) : ?>
                            <?php $section['query']->the_post() ?>
                            <div class="c-search-result__result">
                                <div>
                                    <h3 class="c-search-result__title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h3>
                                    <span class="c-search-result__subtitle">
                                        <?= $section['slug'] === 'news'
                                            ? get_the_date()
                                            : esc_html(wp_trim_words(get_the_excerpt(), 10, '...'))
                                        ?>
                                    </span>
                                </div>
                                <div class="u-ml-auto">
                                    <a class="c-btn c-btn--line" href="<?php the_permalink() ?>"><?= $section['cta'] ?>
                                        <span class="sr-only">to read <?php the_title() ?></a>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                    <?php if ($section['query']->max_num_pages > 1) : ?>
                        <div class="c-paginate">
                            <?=
                            paginate_links([
                                'base' => '%_%',
                                'format' => '/?&current_' . $section['slug'] . '=%#%/#' . $section['slug'],
                                'current' => $section['page'],
                                'total' => $section['query']->max_num_pages,
                                'mid_size' => 3,
                                'type' => 'plain',
                            ])
                            ?>
                        </div>
                    <?php endif ?>
                </div>
            </section>
        <?php endif ?>
        <?php wp_reset_postdata() ?>
    <?php endforeach ?>
</div>

<?php get_footer() ?>
