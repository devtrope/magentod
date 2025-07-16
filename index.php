<?php
require_once 'functions/functions.php';

$shop = getShopDatas();
$home = json_decode(file_get_contents('shop.json'), true);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeParameters = [];
$page = getPageByShopAndUri($uri, $routeParameters);

if ($page) {
    extract($routeParameters);
    $context = [];

    if (isset($slug)) {
        $product = getProductBySlug($slug);
        $context = compact('product');
    }

    $content = renderBlocks($page['content'], $context);
    include 'views/template.php';
    exit;
}

http_response_code(404);
exit;