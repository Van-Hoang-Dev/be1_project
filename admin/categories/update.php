<?php 
require_once "../../config/database.php";

$categoryID = "";
$categoryName = "";

if(isset($_POST["category_id"])){
    $categoryID = $_POST["category_id"];
}

if(isset($_POST["name"])){
    $categoryName = $_POST["name"];
}

$categoryModel = new Category();

if(!empty($categoryID) && !empty($categoryName)){
    $categoryModel->update($categoryID, $categoryName);
    header('location: manage_category.php');
}