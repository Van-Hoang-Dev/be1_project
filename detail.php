<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();
$productModel = new Product();
$categoryModel = new Category();
$id = "";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
$product = $productModel->getProductHaveCategoryID($id);
$category = $categoryModel->getCategoryByID($product['category_id']);
// var_dump($category);
$data = [
    "title" => "Product Detail",
    "slot" => $template->render("blocks/product_detail_layout", ['product' => $product, 'category' => $category])
];
$template->view("layout", $data);
