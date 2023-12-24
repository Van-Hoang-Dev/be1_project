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
   $inventoryModel->deleteInventory($product_id, $date_add);
    header('location: manage_inventory.php');
}

