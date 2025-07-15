<?php

function database() {
    try {
        return new PDO('mysql:host=localhost;dbname=magentod', 'root', 'root');
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