<nav class="navbar">
    <div class="navbar-content">
        <div class="navbar-content__left">
            <a href="/">
                <img src="<?= $shop['logo_image'] ?>" alt="<?= $shop['logo_alt'] ?>" class="logo">
            </a>
            <ul>
                <?php foreach ($shop['navbar']['items'] as $item): ?>
                    <li><a href="<?= $item['link'] ?>"><?= $item['label'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="navbar-content__right">
            <ul>
                <?php foreach ($shop['navbar']['icons'] as $icon): ?>
                    <li><a href="<?= $icon['link'] ?>"><span class="material-symbols-outlined"><?= $icon['name'] ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>