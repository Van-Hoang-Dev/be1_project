<?php 
require_once "../../config/database.php";

$template = new Template();

$inventoryModel = new Inventory();

//Lay id san pham va ngay nhap
$product_id = "";
$date_add = "";
if(isset($_POST["product_id"])){
    $product_id = $_POST["product_id"];
}

if(isset($_POST["date_add"])){
    $date_add = $_POST["date_add"];
}

$inventoryItem = $inventoryModel->getInventoryByProductIdAndDate($product_id, $date_add);

$data = [
    "title"=> "Update discount",
    "slot" => $template->render("blocks/form/inventory/edit_inventory_form", ["inventoryItem" => $inventoryItem])
];

$template->view("layout_admin", $data);