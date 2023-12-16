<?php 
require_once "../../config/database.php";



$categoryName = "";
if(isset($_POST["name"])){
    $categoryName = $_POST["name"];
}

$categoryModel = new Category();


if(!empty($categoryName)){
    $categoryModel->store($categoryName);
    header('location: manage_category.php');
}