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
$products = $productModel->getAllProduct();

$recentViewID = [];
if (isset($_COOKIE['recentView'])) {
    $recentViewID = json_decode($_COOKIE['recentView']);
    if (count($recentViewID) >= 6) {
        array_shift($recentViewID);
        if (count($recentViewID) < 6) {
            if (!in_array($id, $recentViewID)) {
                array_push($recentViewID, $id);
            }
        }
    } else {
        if (!in_array($id, $recentViewID)) {
            array_push($recentViewID, $id);
        }
    }
} else {
    if (!in_array($id, $recentViewID)) {
        array_push($recentViewID, $id);
    }
}

$string =  json_encode($recentViewID);


setcookie('recentView', $string, time() + 300, "/");


// var_dump($recentView);
$data = [
    "title" => "Product Detail",
    "slot" => $template->render("blocks/product_detail_layout", ['product' => $product, 'category' => $category, 'products' => $products])
];
$template->view("layout", $data);
