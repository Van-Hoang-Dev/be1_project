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
    if($categoryModel->update($categoryID, $categoryName)){
        $_SESSION["notify"] = ["check" => 1, "notify"=>"Update category successful!"];
    }
    else{
        $_SESSION["notify"] = ["check" => 0, "notify"=>"Update category unsuccessful!"];
    }
    header('location: manage_category.php');
}