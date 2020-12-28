<?php
get_header() ?>

<div class="o-wrapper u-gutenberg c-page-template">

    <span class="u-text-date">
        <?= get_the_date() ?>
    </span>

    <h1 class="u-text-heading-sm">
        <?php the_title() ?>
    </h1>

    <div>
        <?php the_content() ?>
    </div>

    <?php
      // Required by WordPress Theme Check, feel free to remove as it's rarely used in starter themes
      wp_link_pages([ 'before' => '<div class="page-links">' . esc_html__('Pages:', TEXT_DOMAIN), 'after' => '</div>' ]);
    ?>

    <?php if (get_edit_post_link()) : ?>
        <?php
        edit_post_link(
            sprintf(
                wp_kses(__('Edit <span class="screen-reader-text">%s</span>', TEXT_DOMAIN), [ 'span' => [ 'class' => [] ] ]),
                get_the_title()
            ),
            '<p class="edit-link">',
            '</p>'
        );
        ?>
    <?php endif ?>

    <?php the_post_navigation() ?>

</div>

<?php get_footer() ?>
