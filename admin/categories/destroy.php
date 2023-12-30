<?php 

require_once "../../config/database.php";

$categoryID = "";
if(isset($_POST["category_id"])){
    $categoryID = $_POST["category_id"];
}

$categoryModel = new Category();
if(!empty($categoryID)){
    if($categoryModel->destroy($categoryID)){
        $_SESSION["notify"] = ["check" => 1, "notify"=>"Delete category successful!"];
    }
    else{
        $_SESSION["notify"] = ["check" => 0, "notify"=>"Delete category unsuccessful!"];
    }
    header('location: manage_category.php');
}