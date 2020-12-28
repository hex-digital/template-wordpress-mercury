<?php
get_header() ?>

<div class="o-wrapper c-page-template">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
            the_post() ?>
            <?php the_content() ?>
        <?php endwhile ?>
    <?php endif ?>

</div>

<?php get_footer() ?>
