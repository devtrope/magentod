<div class="breadcrumb">
    <ul>
        <li><a href="/">Accueil</a></li>
        <?php if ($product['category']): ?>
            <li><a href="#"><?= $product['category'] ?></a></li>
        <?php endif; ?>
        <li><?= $product['name'] ?></li>
    </ul>
</div>