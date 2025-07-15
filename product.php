<?php

    require_once 'functions/functions.php';

    $shop = getShopDatas();
    $home = json_decode(file_get_contents('shop.json'), true);
    $product = getProductDatas($_GET['id']);

?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
    <script src="assets/js/main.js" defer></script>
<body>
    <main>
        <?php include 'includes/header.php'; ?>
        
        <div class="site-content">
            <?php if ($home['banner_message'] !== null) : ?>
                <div class="banner">
                    <?= $home['banner_message'] ?>
                </div>
            <?php endif; ?>

            <div class="breadcrumb">
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <?php if ($product['category']): ?>
                        <li><a href="#"><?= $product['category'] ?></a></li>
                    <?php endif; ?>
                    <li><?= $product['name'] ?></li>
                </ul>
            </div>

            <div class="product-header">
                <div class="product-header__content">
                    <div class="product-images">
                        <div class="product-slider">
                            <?php foreach (getProductImages($product['id']) as $image): ?>
                                <img src="<?= $image['image'] ?>" alt="<?= $image['image_alt'] ?>" class="product-image product-slider-image <?= $image['main'] ? 'selected' : '' ?>" data-src="<?= $image['image'] ?>">
                            <?php endforeach; ?>
                        </div>
                        <img src="<?= $product['image'] ?>" alt="<?= $product['image_alt'] ?>" class="product-image main-image">
                    </div>
                    <div class="product-informations">
                        <div class="product-name" style="font-size: 34px; margin-bottom: 32px;"><?= $product['name'] ?></div>
                        <div class="product-description"><?= nl2br($product['description']) ?></div>
                        <div class="product-price"><?= $product['price'] / 100 ?>€</div>
                        <button class="btn btn-primary" style="margin-top: 16px;">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            Ajouter au panier
                        </button>
                        <div class="product-availability" style="margin-top: 16px;">
                            <span class="material-symbols-outlined">check_circle</span>
                            En stock
                        </div>
                        <div class="shipping">
                            <div class="shipping-title">Informations sur la livraison</div>
                            <p>Livraison gratuite pour les commandes de plus de 50€.</p>
                            <p>Expédition sous 24 heures.</p>
                            <p>Retours gratuits sous 30 jours.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-content">
                    <div class="section-title">Vous pourriez aimer aussi</div>
                    <div class="products-grid">
                        <?php foreach (getProductsByShop() as $product): ?>
                            <a href="/product.php?id=<?= $product['id']; ?>" class="product">
                                <img src="<?= $product['image'] ?>" alt="<?= $product['image_alt'] ?>" class="product-image">
                                <div class="product-info">
                                    <h3 class="product-name"><?= $product['name'] ?></h3>
                                    <span class="product-price"><?= $product['price'] / 100 ?>€</span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    
            <?php include 'includes/newsletter.php'; ?>
            <?php include 'includes/footer.php'; ?>
        </div>
    </main>
</body>
</html>