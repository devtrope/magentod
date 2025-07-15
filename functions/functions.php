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
function getShopDatas() {
    $req = database()->query('SELECT * FROM shop WHERE id = 1');
    return $req->fetch(PDO::FETCH_ASSOC);
}

function getProductsByShop() {
    $req = database()->query('SELECT p.*, (SELECT image FROM product_image WHERE product_id = p.id AND main = 1) as image, (SELECT image_alt FROM product_image WHERE product_id = p.id AND main = 1) as image_alt FROM product p WHERE shop_id = 1');
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

function getProductImages(int $productId) {
    $req = database()->prepare('SELECT * FROM product_image WHERE product_id = :id');
    $req->bindParam(':id', $productId, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getPageByShopAndUri(string $uri) {
    $req = database()->prepare('SELECT * FROM page WHERE shop_id = 1 AND url = :uri');
    $req->bindParam(':uri', $uri, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}

function renderBlocks(string $content) {
    return preg_replace_callback('/\[(\w+)(.*?)\]/', function($matches) {
        $block = basename($matches[1]);
        $paramsString = isset($matches[2]) ? trim($matches[2]) : null;

        if ($paramsString) {
            preg_match_all('/(\w+)=("[^"]*"|\'[^\']*\'|\w+)/', $paramsString, $paramMatches, PREG_SET_ORDER);
            $params = [];
    
            foreach ($paramMatches as $param) {
                $key = $param[1];
                $value = trim($param[2], '"\''); // retire les guillemets
                $params[$key] = $value;
            }
    
            extract($params);
        }

        $blockFile = __DIR__ . '/../includes/blocks/' . $block . '.php';

        if (file_exists($blockFile)) {
            ob_start();
            include $blockFile;
            return ob_get_clean();
        } else {
            return "<!-- Block [$block] introuvable -->";
        }
    }, $content);
}