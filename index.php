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
                        <?php if ($section['type'] === 'products') : ?>
                            <div class="products-grid">
                                <?php foreach ($section['products'] as $product): ?>
                                    <a href="<?= $product['link'] ?>" class="product">
                                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-image">
                                        <div class="product-info">
                                            <h3 class="product-name"><?= $product['name'] ?></h3>
                                            <span class="product-price"><?= $product['price'] ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php elseif ($section['type'] === 'text_image'): ?>
                            <div class="grid">
                                <div class="grid__left">
                                    <div class="section-text"><?= $section['text'] ?></div>
                                </div>
                                <div class="grid__right">
                                    <img src="<?= $section['image'] ?>" alt="<?= $section['image_alt'] ?>">
                                </div>
                            </div>
                        <?php elseif ($section['type'] === 'image_text'): ?>
                            <div class="grid">
                                <div class="grid__left">
                                    <img src="<?= $section['image'] ?>" alt="<?= $section['image_alt'] ?>">
                                </div>
                                <div class="grid__right">
                                    <div class="section-text"><?= $section['text'] ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php include 'includes/newsletter.php'; ?>
            <?php include 'includes/footer.php'; ?>
        </div>
    </main>
</body>
</html>