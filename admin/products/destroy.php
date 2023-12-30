<?php 

require_once "../../config/database.php";

$productID ="";
if(isset($_POST["id"])){
    $productID = $_POST["id"];
}


$productModel = new Product();
if(!empty($productID)){
    if($productModel->destroy($productID)){
        $_SESSION["notify"] = ["check" => 1, "notify"=>"Delete product successful!"];
    }
    else{
        $_SESSION["notify"] = ["check" => 0, "notify"=>"Delete product unsuccessful!"];
    }
    header('location: '. $_SERVER['HTTP_REFERER']);
}