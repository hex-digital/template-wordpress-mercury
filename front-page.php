<?php

get_header() ?>

<div class="o-wrapper">
    <div class="o-stack u-gutenberg">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) :
                the_post() ?>
                <?php the_content() ?>
            <?php endwhile ?>
        <?php endif ?>

    </div>
</div>

<?php get_footer(); ?>
