<?php 
require_once "../../config/database.php";

$template = new Template();

//Get all product
$productModel = new Product();
$products = $productModel->getAllProduct();

$data = [
    "title"=> "Add discount",
    "slot" => $template->render("blocks/form/inventory/add_inventory_form", ["products"=>$products])
];

$template->view("layout_admin", $data);