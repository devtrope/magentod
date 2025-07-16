<script src="http://localhost:8084/assets/js/main.js" defer></script>
<div class="product-header">
    <div class="product-header__content">
        <div class="product-images">
            <div class="product-slider">
                <?php foreach (getProductImages($product['id']) as $image): ?>
                    <img src="http://localhost:8084/<?= $image['image'] ?>" alt="<?= $image['image_alt'] ?>" class="product-image product-slider-image <?= $image['main'] ? 'selected' : '' ?>" data-src="http://localhost:8084/<?= $image['image'] ?>">
                <?php endforeach; ?>
            </div>
            <img src="http://localhost:8084/<?= $product['image'] ?>" alt="<?= $product['image_alt'] ?>" class="product-image main-image">
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