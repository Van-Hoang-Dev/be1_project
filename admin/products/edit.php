<?php
require_once '../../config/database.php';

$template = new Template();

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();

//Get product
$productID = "";
if(isset($_POST["id"])){
    $productID = $_POST["id"];
}

$prodcutModel = new Product();
$product = $prodcutModel->getProductWithCategoryByProductID($productID);

$data = [
    "title" => "Edit product",
    "slot" => $template->render("blocks/form/product/edit_product_form", ["product" => $product ,"categories" => $categories])
];

$template->view("layout_admin", $data);
