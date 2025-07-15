<?php if ($home['banner_message'] !== null) : ?>
    <div class="banner">
        <div class="banner-message">
            <?= $home['banner_message'] ?>
        </div>
    </div>
<?php endif; ?>
<nav class="navbar">
    <div class="navbar-content">
        <div class="navbar-content__left">
            <a href="/">
                <img src="<?= $shop['logo'] ?>" alt="<?= $shop['logo_alt'] ?>" class="logo">
            </a>
            <ul>
                <?php foreach ($home['navbar']['items'] as $item): ?>
                    <li><a href="<?= $item['link'] ?>"><?= $item['label'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="navbar-content__right">
            <ul>
                <?php foreach ($home['navbar']['icons'] as $icon): ?>
                    <li><a href="<?= $icon['link'] ?>"><span class="material-symbols-outlined"><?= $icon['name'] ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>