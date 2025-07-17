<?php

function database() {
    try {
        return new PDO('mysql:host=localhost;dbname=magentod', 'root', 'root', [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        ]);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
function getShopDatas(string $slug) {
    $req = database()->prepare('SELECT * FROM shop WHERE slug = :slug');
    $req->bindParam(':slug', $slug, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getProductsByShop(int $id) {
    $req = database()->prepare('SELECT p.*, (SELECT image FROM product_image WHERE product_id = p.id AND main = 1) as image, (SELECT image_alt FROM product_image WHERE product_id = p.id AND main = 1) as image_alt FROM product p WHERE shop_id = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getProductDatas(int $productId) {
    $req = database()->prepare('SELECT p.*,
    (SELECT image FROM product_image WHERE product_id = p.id AND main = 1) as image,
    (SELECT image_alt FROM product_image WHERE product_id = p.id AND main = 1) as image_alt,
    CASE WHEN category_id IS NULL THEN NULL ELSE
    (SELECT name FROM category WHERE id = p.category_id) END as category
    FROM product p WHERE p.id = :id');
    $req->bindParam(':id', $productId, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getProductBySlug(string $slug) {
    $req = database()->prepare('SELECT p.*,
    (SELECT image FROM product_image WHERE product_id = p.id AND main = 1) as image,
    (SELECT image_alt FROM product_image WHERE product_id = p.id AND main = 1) as image_alt,
    CASE WHEN category_id IS NULL THEN NULL ELSE
    (SELECT name FROM category WHERE id = p.category_id) END as category
    FROM product p WHERE p.slug = :slug');
    $req->bindParam(':slug', $slug, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getProductImages(int $productId) {
    $req = database()->prepare('SELECT * FROM product_image WHERE product_id = :id');
    $req->bindParam(':id', $productId, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getPageByShopAndUri(int $shopId, string $uri, &$routeParameters = []) {
    $req = database()->prepare('SELECT * FROM page WHERE shop_id = :id');
    $req->bindParam(':id', $shopId, PDO::PARAM_INT);
    $req->execute();
    $pages = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($pages as $page) {
        $urlPattern = trim($page['url'], '/');

        $pattern = preg_replace_callback('/\{(\w+)\}/', function($m) {
            return '(?P<' . $m[1] . '>[^/]+)';
        }, $urlPattern);

        $regex = '#^' . $pattern . '$#';

        if (preg_match($regex, trim($uri, '/'), $matches)) {
            foreach ($matches as $key => $value) {
                if (! is_int($key)) {
                    $routeParameters[$key] = $value;
                }
            }

            return $page;
        }
    }

    return false;
}

function renderBlocks(string $content, array $context = []) {
    return preg_replace_callback('/\[(\w+)(.*?)\]/', function($matches) use ($context) {
        $block = basename($matches[1]);
        $attributes = $matches[2];

        preg_match_all('/(\w+)=("[^"]*"|\'[^\']*\'|\w+)/', $attributes, $attributesMatches, PREG_SET_ORDER);
        $attributesArray = [];

        foreach ($attributesMatches as $attr) {
            // On nettoie les guillemets autour des valeurs
            $attributesArray[$attr[1]] = trim($attr[2], '"\'');
        }

        ob_start();
        extract($context);
        extract($attributesArray); // Les attributs deviennent des variables

        $blockFile = __DIR__ . '/../includes/blocks/' . $block . '.php';

        if (file_exists($blockFile)) {
            include $blockFile;
        } else {
            echo "<!-- Block [$block] introuvable -->";
        }

        return ob_get_clean();
    }, $content);
}