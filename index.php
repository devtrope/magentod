<?php

    $shop = json_decode(file_get_contents('shop.json'), true);

?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
<body>
    <main>
        <?php include 'includes/header.php'; ?>
        <div class="site-content">
            <div class="header" style="background-image: url(<?= $shop['header_background_image'] ?>)"></div>
            <?php if ($shop['banner_message'] !== null) : ?>
                <div class="banner">
                    <?= $shop['banner_message'] ?>
                </div>
            <?php endif; ?> 
            <?php foreach ($shop['sections'] as $section): ?>
                <div class="section">
                    <div class="section-content">
                        <div class="section-title"><?= $section['title'] ?></div>
                        <div class="section-subtitle"><?= $section['subtitle'] ?></div>
                        <?php include 'includes/blocks/' . $section['type'] . '.php'; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php include 'includes/newsletter.php'; ?>
            <?php include 'includes/footer.php'; ?>
        </div>
    </main>
</body>
</html>