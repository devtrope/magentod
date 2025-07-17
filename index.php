<?php
require_once 'functions/functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parsedURI = explode('/', trim($uri, '/'));

$shopSlug = $parsedURI[0] ?? null;
$calledUri = '/';

if (isset($parsedURI[1])) {
    $calledUri .= $parsedURI[1];
}

for ($i = 2; $i < count($parsedURI); $i++) {
    $calledUri .= '/' . $parsedURI[$i];
}

$shop = getShopDatas($shopSlug);
$home = json_decode(file_get_contents('shop.json'), true);

$routeParameters = [];
$page = getPageByShopAndUri($shop['id'], $calledUri, $routeParameters);

if ($page) {
    extract($routeParameters);
    $context = ['shop'];

    if (isset($slug)) {
        $product = getProductBySlug($slug);
        $context[] = 'product';
    }

    $context = compact($context);

    $content = renderBlocks($page['content'], $context);
    include 'views/template.php';
    exit;
}

http_response_code(404);
exit;