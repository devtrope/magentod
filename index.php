<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
    <title>Template de test</title>
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
                    <img src="logo.jpeg" alt="" class="logo">
                    <ul>
                        <li><a href="#">Produits</a></li>
                        <li><a href="#">Qui sommes-nous ?</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="navbar-content__right">
                    <ul>
                        <li><a href="#"><span class="material-symbols-outlined">person</span></a></li>
                        <li><a href="#"><span class="material-symbols-outlined">shopping_cart</span></a></li>
                        <li><a href="#"><span class="material-symbols-outlined">search</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header"></div>
        <div class="banner">
            Livraison gratuite à partir de 50€ d'achat !
        </div>
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
                <div class="section-title">S'inscrire à la newsletter</div>
                <div class="section-subtitle">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus illum aspernatur iste esse molestias eligendi doloribus earum tempore, unde ad maiores optio fugit error impedit, laudantium quo explicabo saepe ex.</div>
                <form action="">
                    <input class="input-form" type="text" name="" id="" placeholder="Entrez votre email">
                </form>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <div class="footer-content__block">
                    <img src="logo.jpeg" alt="" class="logo">
                    <p>© 2023 Votre entreprise. Tous droits réservés.</p>
                </div>
                <div class="footer-content__block">
                    <div class="footer-title">A propos</div>
                    <ul>
                        <li><a href="#">Nous connaître</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-content__block">
                    <div class="footer-title">Mentions légales</div>
                    <ul>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>