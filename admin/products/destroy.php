<?php 

require_once "../../config/database.php";

$productID ="";
if(isset($_POST["id"])){
    $productID = $_POST["id"];
}


$productModel = new Product();
if(!empty($productID)){
    $productModel->destroy($productID);
    header('location: '. $_SERVER['HTTP_REFERER']);
}