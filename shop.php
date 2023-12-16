<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

//Get category id
$category_id = "";

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();
//Get product
$productModel = new Product();
$products = $productModel->getAllProduct();

//Get page
$perPgae = 6;
$currentPage = 1;
$paginationBar = "";
if (isset($_GET["page"])) {
    $currentPage = intval($_GET["page"]);
}


if (isset($_GET["category_id"])) {
    $category_id = $_GET["category_id"];
    $products = $productModel->getProductByCategoryID($category_id);
} else {
    //Get pagination bar
    $total = $productModel->getTotalProducts()["COUNT(*)"];

    $products = $productModel->getProductWithLimit($currentPage, $perPgae);
    $paginationBar = $productModel->getPaginationBar("shop.php", $total, $currentPage, $perPgae, 2);
}
$data = [
    "title" => "Shop",
    "slot" => $template->render("blocks/shop_layout", ["products" => $products, "categories" => $categories, "paginationBar" => $paginationBar])
];

$template->view("layout", $data);
