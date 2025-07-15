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
    $req = database()->query('SELECT * FROM product WHERE shop_id = 1');
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getProductDatas(int $productId) {
    $req = database()->prepare('SELECT * FROM product WHERE id = :id');
    $req->bindParam(':id', $productId, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}