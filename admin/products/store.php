<?php
require_once "../../config/database.php";

$productName = "";
$productPrice = "";
$productDescription = "";
$productImage = "";
$categoresID = [];
$discount_id = [];

if (isset($_POST["name"])) {
    $productName = $_POST["name"];
}
if (isset($_POST["price"])) {
    $productPrice = $_POST["price"];
}
if (isset($_POST["description"])) {
    $productDescription = $_POST["description"];
}
if (isset($_POST["image"])) {
    $productImage = $_POST["image"];
}
if (isset($_POST["categories"])) {
    $categoriesID = $_POST["categories"];
}
if (isset($_POST["discounts"])) {
    $discount_id = $_POST["discounts"];
}

// var_dump($productName);
// var_dump($productPrice);
// var_dump($productDescription);
// var_dump($productImage);
// var_dump($categoriesID);
// var_dump($discount_id);

$productImage = "https://clickbuy.com.vn/uploads/2023/09/iphone-15-pro-max-xanh-1.png";
$productModel = new Product();
if (!empty($productName) &&  !empty($productPrice) && !empty($productDescription) && !empty($productImage) && !empty($categoriesID) && !empty($discount_id)) {
    $productModel->store($productName, $productPrice, $productDescription, $productImage, $categoriesID, $discount_id);
    header('location: manage_product.php');
}
