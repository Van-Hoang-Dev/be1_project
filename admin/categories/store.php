<?php 
require_once "../../config/database.php";



$categoryName = "";
if(isset($_POST["name"])){
    $categoryName = $_POST["name"];
}

$categoryModel = new Category();


if(!empty($categoryName)){
    if($categoryModel->store($categoryName)){
        $_SESSION["notify"] = ["check" => 1, "notify"=>"Add category successful!"];
    }
    else{
        $_SESSION["notify"] = ["check" => 0, "notify"=>"Add category unsuccessful!"];
    }
    header('location: manage_category.php');
}