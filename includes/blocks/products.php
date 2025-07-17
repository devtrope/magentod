<div class="section">
    <div class="section-content">
        <?php if (isset($title)) : ?>
            <div class="section-title"><?= $title ?></div>
        <?php endif; ?>
        <?php if (isset($subtitle)) : ?>
            <div class="section-subtitle"><?= $subtitle ?></div>
        <?php endif; ?>
        <div class="products-grid">
            <?php foreach (getProductsByShop($shop['id']) as $product): ?>
                <a href="/<?= $shop['slug'] ?>/product/<?= $product['slug'] ?>" class="product">
                    <img src="http://localhost:8084/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-name"><?= $product['name'] ?></h3>
                        <span class="product-price"><?= $product['price'] / 100 ?>€</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>