<?php
get_header() ?>

<div class="o-wrapper c-page-template">
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>

    <?php if (get_edit_post_link()) : ?>
        <?php
        edit_post_link(
            sprintf(
                wp_kses(__('Edit <span class="screen-reader-text">%s</span>', TEXT_DOMAIN), ['span' => ['class' => []]]),
                get_the_title()
            ),
            '<p class="edit-link">',
            '</p>'
        );
        ?>
    <?php endif ?>
</div>

<?php get_footer() ?>
