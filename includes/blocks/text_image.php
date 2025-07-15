<div class="section">
    <div class="section-content">
        <?php if (isset($title)) : ?>
            <div class="section-title"><?= $title ?></div>
        <?php endif; ?>
        <?php if (isset($subtitle)) : ?>
            <div class="section-subtitle"><?= $subtitle ?></div>
        <?php endif; ?>
        <div class="grid">
            <div class="grid__left">
                <div class="section-text"><?= $text ?></div>
            </div>
            <div class="grid__right">
                <img src="<?= $image ?>" alt="<?= $image_alt ?>">
            </div>
        </div>
    </div>
</div>