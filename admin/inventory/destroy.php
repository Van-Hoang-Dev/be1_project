<?php 

require_once "../../config/database.php";

//Lay id san pham va ngay nhap
$product_id = "";
$date_add = "";
if(isset($_POST["product_id"])){
    $product_id = $_POST["product_id"];
}

if(isset($_POST["date_add"])){
    $date_add = $_POST["date_add"];
}

$inventoryModel = new Inventory();
if(!empty($product_id) && !empty($date_add)){
   if($inventoryModel->deleteInventory($product_id, $date_add)){
    $_SESSION["notify"] = ["check" => 1, "notify" => "Delete inventory successful!"];
} else {
    $_SESSION["notify"] = ["check" => 0, "notify" => "Delete inventory unsuccessful!"];
}
    header('location: manage_inventory.php');
}

