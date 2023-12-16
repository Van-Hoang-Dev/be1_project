<?php
require_once '../../config/database.php';

$template = new Template();

//Get product
$productModel = new Product();
$products = $productModel->getAllProduct();

$data = [
    "title" => "Product management",
    "slot" => $template->render("blocks/products_management", ["products" => $products])
];

$template->view("layout_admin", $data);
