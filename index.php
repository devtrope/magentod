<?php
require_once 'functions/functions.php';
$shop = getShopDatas();
$home = json_decode(file_get_contents('shop.json'), true);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$page = getPageByShopAndUri($uri);

if (! $page) {
    http_response_code(404);
    exit;
}

$content = $page['content'];
include 'views/template.php';