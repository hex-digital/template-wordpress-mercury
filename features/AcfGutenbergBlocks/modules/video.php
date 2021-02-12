<?php

// Sometimes the field will have a different name. If so, just set $video_data before including this partial, then unset it afterwards
$video = $video_data ?: get_field('video') ?? [];

?>

<figure class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio">
    <div class="wp-block-embed__wrapper">
        <?= acf_oembed_background_with_options($video) ?>
    </div>
</figure>
