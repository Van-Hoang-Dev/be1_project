<?php 

require_once "../../config/database.php";

$categoryID = "";
if(isset($_POST["category_id"])){
    $categoryID = $_POST["category_id"];
}

$categoryModel = new Category();
if(!empty($categoryID)){
    $categoryModel->destroy($categoryID);
    header('location: manage_category.php');
}