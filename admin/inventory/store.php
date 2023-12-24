<?php 

require_once '../../config/database.php';

$product_id = "";
$date_add = "";
$input_quantity = "";

if(isset($_POST["product_id"])){
    $product_id = intval($_POST["product_id"]);
}

if(isset($_POST["date_add"])){
    $date_add = $_POST["date_add"];
}

if(isset($_POST["input_quantity"])){
    $input_quantity = intval($_POST["input_quantity"]);
}


$inventoryModel = new Inventory();
if(!empty($product_id) && !empty($date_add) && !empty($input_quantity)){
    $inventoryItem = [
        "product_id" => $product_id,
        "date_add" => $date_add,
        "input_quantity" => $input_quantity
    ];

    $inventoryModel->addInventory($inventoryItem);
    header('location: manage_inventory.php');
}





