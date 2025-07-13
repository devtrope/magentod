<?php

    $shop = json_decode(file_get_contents('shop.json'), true);
    $product = json_decode(file_get_contents('product.json'), true);

?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.php'; ?>
<body>
    <main>
        <?php include 'includes/header.php'; ?>
        
        <div class="site-content">
            <?php if ($shop['banner_message'] !== null) : ?>
                <div class="banner">
                    <?= $shop['banner_message'] ?>
                </div>
            <?php endif; ?>

            <div class="breadcrumb">
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="<?= $product['category_link'] ?>"><?= $product['category_name'] ?></a></li>
                    <li><?= $product['product_name'] ?></li>
                </ul>
            </div>

            <div class="product-header">
                <div class="product-header__content">
                    <div class="product-images">
                        <div class="product-slider">
                            <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image selected">
                            <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image">
                            <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image">
                            <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image">
                        </div>
                        <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image">
                    </div>
                    <div class="product-informations">
                        <div class="product-name" style="font-size: 34px; margin-bottom: 32px;"><?= $product['product_name'] ?></div>
                        <div class="product-description"><?= $product['product_description'] ?></div>
                        <div class="product-price"><?= $product['product_price'] ?></div>
                        <button class="btn btn-primary" style="margin-top: 16px;width: 100%;">
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
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <a href="#" class="product">
                                <img src="<?= $product['product_image'] ?>" alt="<?= $product['product_image_alt'] ?>" class="product-image">
                                <div class="product-info">
                                    <h3 class="product-name"><?= $product['product_name'] ?></h3>
                                    <span class="product-price"><?= $product['product_price'] ?></span>
                                </div>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
    
            <?php include 'includes/newsletter.php'; ?>
            <?php include 'includes/footer.php'; ?>
        </div>
    </main>
</body>
</html>