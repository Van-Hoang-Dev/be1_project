<?php
require_once '../../config/database.php';

$template = new Template();

//Get category
$categorieModel = new Category();
$categories = $categorieModel->getAllCategory();

//Get all discount
$discountModel = new Discount();
$discounts = $discountModel->getAllDiscount();

//Get product
$productID = "";
if(isset($_POST["id"])){
    $productID = $_POST["id"];
}

$prodcutModel = new Product();
$product = $prodcutModel->getProductWithCategoryAndDiscountByProductID($productID);

$data = [
    "title" => "Edit product",
    "slot" => $template->render("blocks/form/product/edit_product_form", ["product" => $product ,"categories" => $categories, "discounts" => $discounts])
];

$template->view("layout_admin", $data);
