<?php

    $shop = json_decode(file_get_contents('shop.json'), true);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $shop['meta_description'] ?>">
    <title><?= $shop['meta_title'] ?></title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <main>
        <nav class="navbar">
            <div class="navbar-content">
                <div class="navbar-content__left">
                    <img src="<?= $shop['logo_image'] ?>" alt="<?= $shop['logo_alt'] ?>" class="logo">
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
        <div class="header" style="background-image: url(<?= $shop['header_background_image'] ?>)"></div>
        <?php if ($shop['banner_message'] !== null) : ?>
            <div class="banner">
                <?= $shop['banner_message'] ?>
            </div>
        <?php endif; ?> 
        <div class="section">
            <div class="section-content">
                <div class="section-title">Produits à la une</div>
                <div class="section-subtitle">Sous-titre de la section</div>
                <div class="grid">
                    <?php for ($i = 0; $i < 8; $i++) : ?>
                        <div class="product">
                            <img src="merch.jpg" alt="" class="product-image">
                            <div class="product-info">
                                <h3 class="product-title">Nom du produit</h3>
                                <span class="product-price">€99.99</span>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="section gray">
            <div class="section-content">
                <div class="section-title">Titre de section</div>
                <div class="grid-double">
                    <div class="grid-double__left">
                        <div class="section-subtitle">Sous-titre de la section</div>
                        <div class="section-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                        </div>
                        <div class="section-buttons">
                            <button class="btn btn-primary">En savoir plus</button>
                        </div>
                    </div>
                    <img src="clark-street-mercantile-P3pI6xzovu0-unsplash.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section-content">
                <div class="section-title">Titre de section</div>
                <div class="grid-double">
                    <img src="clark-street-mercantile-P3pI6xzovu0-unsplash.jpg" alt="">
                    <div class="grid-double__left">
                        <div class="section-subtitle">Sous-titre de la section</div>
                        <div class="section-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur expedita distinctio velit
                            cumque laboriosam inventore? Sit molestiae eum beatae tempore illo recusandae, corporis unde rerum,
                            placeat laudantium consequatur nobis minima.
                        </div>
                        <div class="section-buttons">
                            <button class="btn btn-primary">En savoir plus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section-content">
                <div class="section-title"><?= $shop['newsletter_title'] ?></div>
                <div class="section-subtitle"><?= $shop['newsletter_description'] ?></div>
                <form action="">
                    <input class="input-form" type="text" name="" id="" placeholder="Entrez votre email">
                </form>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <div class="footer-content__block">
                    <img src="<?= $shop['logo_image'] ?>" alt="<?= $shop['logo_alt'] ?>" class="logo">
                    <p><?= $shop['footer']['text'] ?></p>
                </div>
                <?php foreach ($shop['footer']['blocks'] as $block): ?>
                    <div class="footer-content__block">
                        <div class="footer-title"><?= $block['title'] ?></div>
                        <ul>
                            <?php foreach ($block['links'] as $link): ?>
                                <li><a href="<?= $link['link'] ?>"><?= $link['label'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </footer>
    </main>
</body>
</html>