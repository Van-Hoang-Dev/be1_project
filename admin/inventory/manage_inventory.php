<?php 
require_once "../../config/database.php";


$template = new Template();

//Get inventory
$inventoryModel = new Inventory();
$inventory  = $inventoryModel->getAllInventoryWithProductInfo();
$data = ["title"=>"Inventory Management", 
        "slot" => $template->render("blocks/manage/inventory_management", ["inventory"=>$inventory])];


$template->view("layout_admin", $data);