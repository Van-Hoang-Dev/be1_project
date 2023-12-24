<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});
$template = new Template();
$key = "";
$priceS = "";
$priceE = "";
if(isset($_POST["key"])){
    $key = $_POST["key"];
}

if(isset($_POST["priceS"])){
    $priceS = $_POST["priceS"];
}

if(isset($_POST["priceE"])){
    $priceE = $_POST["priceE"];
}

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();
// Get product
$productModel = new Product();
if (!is_numeric($priceS) && !is_numeric($priceE)) {
    $products = $productModel->getProductsByKeyWord($key);
}
else {
    $products = $productModel->getProductsByPrice($priceS, $priceE);
}

$data = [
    "title" => "Search",
    "slot" => $template->render("blocks/shop_layout", ["products" => $products, "categories" => $categories])
];

$template->view("layout", $data);

