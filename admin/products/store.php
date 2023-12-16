<?php
require_once "../../config/database.php";

$productName = "";
$productPrice = "";
$productDescription = "";
$productImage = "";
$categoresID = [];

if(isset($_POST["name"])){
    $productName = $_POST["name"];
}
if(isset($_POST["price"])){
    $productPrice = $_POST["price"];
}
if(isset($_POST["description"])){
    $productDescription = $_POST["description"];
}
if(isset($_POST["image"])){
    $productImage = $_POST["image"];
}
if(isset($_POST["categories"])){
    $categoriesID = $_POST["categories"];
}

// var_dump($productName);
// var_dump($productPrice);
// var_dump($productDescription);
// var_dump($productImage);
// var_dump($categoriesID);


$productModel = new Product();
if(!empty($productName) &&  !empty($productPrice) && !empty($productDescription) && !empty($productImage) && !empty($categoriesID)){
$productModel->store($productName, $productPrice, $productDescription, $productImage, $categoriesID);
header('location: manage_product.php');
}