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