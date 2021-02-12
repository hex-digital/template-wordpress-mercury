<?php

// Sometimes the field will have a different name. If so, just set $background_data before including this partial, then unset it afterwards
$background = $background_data ?: get_field('background') ?? [];

?>

<div class="u-absolute u-inset-0">
    <div class="u-absolute u-inset-0">
        <?= acf_background_image_from_id($background['image_id']) ?>
    </div>
    <?php $video_data = $background['video'] ?>
    <?php include __DIR__ . '/video.php'; ?>
    <?php unset($video_data) ?>
    <?= $background['shim'] ? acf_shim_overlay() : '' ?>
</div>
