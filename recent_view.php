<?php
require_once 'config/database.php';
spl_autoload_register(function ($className) {
    require_once "app/models/$className.php";
});
$template = new Template();
$productModel = new Product();
$products = $productModel->getAllProduct();
$recentView  =[];
if (isset($_COOKIE['recentView'])) {
    $recentView = json_decode($_COOKIE['recentView']);
}


$data = [
    'title' => "Recent View",
    'slot'  => $template->render('block/product_detail_layout', ['products' => $products, 'recentView' => $recentView])
];

$template->view('layout', $data);


