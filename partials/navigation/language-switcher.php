<div class="c-polylang">
    <?php
    $languages = pll_the_languages(
        [
            'display_names_as' => 'name',
            'show_flags' => 0,
            'force_home' => 1,
            'dropdown' => 0,
            'hide_if_empty' => 1,
            'force_home' => 1,
            'raw' => 1,
        ]
    );
    ?>

    <div class="c-polylang__button">
        <?= pll_current_language('slug'); ?>
    </div>

    <div class="c-polylang__container">
        <span class="c-polylang__label">Choose language:</span>
        <ul class="c-polylang__languages">
        <?php foreach ($languages as $language) : ?>
            <?php $language_classes = implode(' ', $language['classes']); ?>
            <li class="<?= $language_classes; ?>">
                <?php
                if (strpos($language_classes, 'current-lang')) {
                    $is_current = 'c-polylang__link--current';
                } else {
                    $is_current = '';
                }
                ?>
                <a class="c-polylang__link <?php echo $is_current; ?>" href="<?= $language['url']; ?>">
                    <?= $language['name']; ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
