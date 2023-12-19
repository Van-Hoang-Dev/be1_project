<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();
$productModel = new Product();
$id = "";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$product = $productModel->getProductByID($id);
$data = [
    "title" => "Product Detail",
    "slot" => $template->render("blocks/product_detail_layout", ['product' => $product])
];
// var_dump($product);
$template->view("layout", $data);
